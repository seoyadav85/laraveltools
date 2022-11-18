<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        
        $reqData = $request->all();
        $query = Categories::where('id','>',0);
        if(!empty($reqData['title']))
        {
            $query->where('title', 'like', '%' . $reqData['title'] . '%');
        }
        if(isset($reqData['status']) && $reqData['status'] > 0)
        {
            if($reqData['status'] == 1)
            {
                $query->where('status',1);
            }
            else if($reqData['status'] == 2)
            {
                $query->where('status',0);
            }
        }
    	$data = $query->orderBy('id','desc')->paginate(10);
    	return view('admin.category.index',compact('data'));
    }

    public function create()
    {
    	return view('admin.category.add');
    }

    public function store(Request $request)
    {

    	$reqData = $request->all();
    	$request->validate( 
        [
        	'title'=>'required|min:3|max:50',
            'description'=>'required|min:3|max:100',
            'status'=>'required'
        ]);
       
        $post = new Categories();
        $post->title = $reqData['title'] ?? '';
        $post->description = $reqData['description'] ?? ''; 
        $post->status = $reqData['status'] ?? 0;  
        $post->save();        
        if($post->save())
        {
        	return \Redirect::route('admin.category.index')->with('success','Record saved Successfully!');
        }
        else
        {
        	return \Redirect::back()->with('error','Record not saved!');
        }

       //return \Redirect::back()->with('error','Invalid credentials!');
    }

    public function edit($id = null)
    {
    	$data = Categories::where(['id'=>$id])->first();
    	return view('admin.category.edit',compact('data'));
    }

    public function update(Request $request)
    {
    	$id = $request->id;
    	$post = Categories::where('id',$id)->first();
    	if(!empty($post))
    	{
    		$reqData = $request->all();
	    	$request->validate( 
            [
                'title'=>'required|min:3|max:50',
                'description'=>'required|min:3|max:100',
                'status'=>'required'
            ]);
            $post->title = $reqData['title'] ?? '';
            $post->description = $reqData['description'] ?? '';
            $post->status = $reqData['status'] ?? 0;   
            $post->save();  
	        return \Redirect::route('admin.category.index')->with('success','Record updated Successfully!');
    	}
    	else
    	{
    		return \Redirect::route('admin.category.edit')->with('error','Record not found!');
    	}
    }

    public function delete($id = null)
    {
    	$data = Categories::where('id',$id)->first();
    	if(!empty($data))
    	{
    		Categories::where('id',$id)->delete();
    		return \Redirect::route('admin.category.index')->with('error','Record deleted successfully!');
    	}
    	else
    	{
    		Categories::where('id',$id)->delete();
    		return \Redirect::route('admin.category.index')->with('error','Record not found!');
    	}    	
    }

    public function activeRecord($id = null)
    {
        $data = Categories::where('id',$id)->first();
        if(!empty($data))
        {
            Categories::where('id',$id)->update(['status'=>1]);
            return \Redirect::route('admin.category.index')->with('error','Record active successfully!');
        }
        else
        {
            Categories::where('id',$id)->delete();
            return \Redirect::route('admin.category.index')->with('error','Record not found!');
        }  
    }

    public function deactiveRecord($id = null)
    {

        $data = Categories::where('id',$id)->first();
        if(!empty($data))
        {
            Categories::where('id',$id)->update(['status'=>0]);
            return \Redirect::route('admin.category.index')->with('error','Record in-active successfully!');
        }
        else
        {
            Categories::where('id',$id)->delete();
            return \Redirect::route('admin.category.index')->with('error','Record not found!');
        }  
    }
}
