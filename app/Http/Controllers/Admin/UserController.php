<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Tools;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     public function login()
    {
        return view('admin.user.login');
    }

    public function doLogin(Request $request)
    {       

         $user_data = array(
          'email'  => $request->input('email'),
          'password' => $request->input('password')
         );

         $request->validate( 
        [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ],
        [
            'email.required' => 'Email is required!',
            'email.email' => 'Please enter a valid email!',
            'password.required' => 'Password is required!',
        ]
        );       
        $dataUser = DB::table('users')->where('email',$user_data['email'])->first();  

         if(empty($dataUser))
         {
           return \Redirect::back()->with('error','Invalid credentials!');
         }
         $remember_me = $request->has('remember_token') ? true : false;
         if(Auth::attempt($user_data))
         {
            $dataUser = Auth::user();        
            if($dataUser->role_id == 1)
            {
                 return \Redirect::route('admin.dashboard');
            }
            else
            {
                return \Redirect::back()->with('error','Invalid credentials!');
            }
            
         }
         else
         {
            return \Redirect::back()->with('error','Invalid credentials!');
         }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return \Redirect::route('admin.login')->with('success','Logout Successfully');
    }

    public function dashboard()
    {
        $allCategoryCount = count(Categories::get());
        $activeCategoryCount = count(Categories::where(['status'=>1])->get());
        $inactiveCategoryCount = count(Categories::where(['status'=>0])->get());
        $allToolsCount = count(Tools::get());
        $activeToolsCount = count(Tools::where(['status'=>1])->get());
        $inactiveToolsCount = count(Tools::where(['status'=>0])->get());
    	return view('admin.user.dashboard',compact('allCategoryCount','activeCategoryCount','inactiveCategoryCount','allToolsCount','activeToolsCount','inactiveToolsCount'));
    }

    public function index()
    {
    	$data = Users::where('role_id',2)->orderBy('id','desc')->paginate(10);
    	return view('admin.user.user_list',compact('data'));
    }

    public function create()
    {
    	return view('admin.user.user_add');
    }

    public function store(Request $request)
    {
    	$reqData = $request->all();
    	$request->validate( 
        [
        	'name'=>'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'postal_code'=>'nullable|numeric',
        ]);
        $post = new Users();
        $post->name = $reqData['name'] ?? '';
        $post->address = $reqData['address'] ?? '';
        $post->email = $reqData['email'] ?? '';
        $password = $reqData['password'] ?? '';
        $post->password = Hash::make($password);
        $post->role_id = 2;
        if(!empty($reqData['dob']))
        {
        	$post->dob = date('Y-m-d',strtotime($reqData['dob']));
        }
        $post->postal_code = $reqData['postal_code'] ?? '';
        $post->gender = $reqData['gender'] ?? 0;
        $post->status = $reqData['status'] ?? 0;
        if($post->save())
        {
        	return \Redirect::route('admin.user.index')->with('success','Record saved Successfully!');
        }
        else
        {
        	return \Redirect::back()->with('error','Record not saved!');
        }

       //return \Redirect::back()->with('error','Invalid credentials!');
    }

    public function edit($id = null)
    {
    	$data = Users::where(['id'=>$id])->first();
    	return view('admin.user.user_edit',compact('data'));
    }

    public function update(Request $request)
    {
    	$id = $request->id;
    	$post = Users::where('id',$id)->first();
    	if(!empty($post))
    	{
    		$reqData = $request->all();
	    	$request->validate( 
	        [
	        	'name'=>'required|string',
	            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
	            'password' => 'required_with:confirm_password|same:confirm_password',
	            'postal_code'=>'nullable|numeric',
	        ]);
	        $post->name = $reqData['name'] ?? '';
	        $post->address = $reqData['address'] ?? '';
	        $post->email = $reqData['email'] ?? '';
	        $password = $reqData['password'] ?? '';
	        $post->password = Hash::make($password);
	        if(!empty($reqData['dob']))
	        {
	        	$post->dob = date('Y-m-d',strtotime($reqData['dob']));
	        }
	        $post->postal_code = $reqData['postal_code'] ?? '';
	        $post->gender = $reqData['gender'] ?? 0;
            $post->status = $reqData['status'] ?? 0;
	        $post->save();
	        return \Redirect::route('admin.user.index')->with('success','Record updated Successfully!');
    	}
    	else
    	{
    		return \Redirect::route('admin.user.edit')->with('error','Record not found!');
    	}
    }

    public function delete($id = null)
    {
    	$data = Users::where('id',$id)->first();
    	if(!empty($data))
    	{
    		Users::where('id',$id)->delete();
    		return \Redirect::route('admin.user.index')->with('success','Record deleted successfully!');
    	}
    	else
    	{
    		Users::where('id',$id)->delete();
    		return \Redirect::route('admin.user.index')->with('error','Record not found!');
    	}    	
    }

    public function changePassword()
    {
        return view('admin.user.change_password');
    }

    public function doChangePassword(Request $request)
    {
        $postData = $request->all();
        $request->validate( 
        [
            'old_password'=>'required|min:6|max:30',
            'new_password'=>'required|min:6|max:30',
            'confirm_password'=>'required|same:new_password'
        ]);
        if (!\Hash::check($postData['old_password'], Auth::user()->password)) {
            return \Redirect::back()->with('error','Your old password is not matched, Please try again!');
        }
        else
        {
            $newPassword = Hash::make($postData['new_password']);
            Users::where(['id'=>Auth::user()->id])->update(['password'=>$newPassword]);
            return \Redirect::back()->with('success','Password updated successfully!');
        }
    }
}
