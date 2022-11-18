<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tools;
use App\Models\Categories;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
class ToolController extends Controller
{
    public function index(Request $request)
    {
        $dataCategories = Categories::where(['status'=>1])->get();
        $reqData = $request->all();
        $query = Tools::with(['category']);
        if(!empty($reqData['title']))
        {
            $query->where('title', 'like', '%' . $reqData['title'] . '%');
        }
        if(!empty($reqData['category_id']))
        {
            $query->where('category_id',$reqData['category_id']);
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
        //dd($data);
    	return view('admin.tools.index',compact('data','dataCategories'));
    }

    public function create()
    {
        $dataCategory = Categories::where(['status'=>1])->get();
        return view('admin.tools.add',compact('dataCategory'));
    }

    public function store(Request $request)
    {
    	$reqData = $request->all();

    	$request->validate( 
        [
        	'title'=>'required|min:3|max:50',
            'category_id'=>'required',
            'short_description'=>'required|min:3|max:100',
            'description'=>'required',
            'status'=>'required',
            'icon' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);

        $post = new Tools();
        $post->title = $reqData['title'] ?? '';
        $post->short_description = $reqData['short_description'] ?? '';
        $post->slug = strtolower(str_replace(' ','_', $reqData['title']));
        $post->description = $reqData['description'] ?? '';
        $post->category_id = $reqData['category_id'] ?? ''; 
        $post->status = $reqData['status'] ?? 0; 
        $post->meta_title = $reqData['meta_title'] ?? ''; 
        $post->meta_keyword = $reqData['meta_keyword'] ?? ''; 
        $post->meta_description = $reqData['meta_description'] ?? ''; 

        $imageName = time().'.'.$request->icon->extension();
        $request->icon->move(public_path('/uploads/icon/'), $imageName);
        $post->icon = $imageName;
        $post->save();        
        if($post->save())
        {
        	return \Redirect::route('admin.tools.index')->with('success','Record saved Successfully!');
        }
        else
        {
        	return \Redirect::back()->with('error','Record not saved!');
        }

       //return \Redirect::back()->with('error','Invalid credentials!');
    }

    public function edit($id = null)
    {
    	$data = Tools::where(['id'=>$id])->first();
        $dataCategory = Categories::where(['status'=>1])->get();
    	return view('admin.tools.edit',compact('data','dataCategory'));
    }

    public function update(Request $request)
    {
    	$id = $request->id;
    	$post = Tools::where('id',$id)->first();
    	if(!empty($post))
    	{
    		$reqData = $request->all();
	    	$request->validate( 
            [
                'title'=>'required|min:3|max:50',
                'category_id'=>'required',
                'short_description'=>'required|min:3|max:100',
                'description'=>'required',
                'status'=>'required',
            ]);
            $post->title = $reqData['title'] ?? '';
            $post->short_description = $reqData['short_description'] ?? '';        
            $post->status = $reqData['status'] ?? 0;
            $post->description = $reqData['description'] ?? ''; 
            $post->category_id = $reqData['category_id'] ?? ''; 
            $post->meta_title = $reqData['meta_title'] ?? ''; 
            $post->meta_keyword = $reqData['meta_keyword'] ?? ''; 
            $post->meta_description = $reqData['meta_description'] ?? '';  

            if(!empty($request->icon))
            {
                $imageName = time().'.'.$request->icon->extension();
                $request->icon->move(public_path('/uploads/icon/'), $imageName);
                $post->icon = $imageName;
            }           

            $post->save();  
	        return \Redirect::route('admin.tools.index')->with('success','Record updated Successfully!');
    	}
    	else
    	{
    		return \Redirect::route('admin.tools.edit')->with('error','Record not found!');
    	}
    }

    public function delete($id = null)
    {
    	$data = Tools::where('id',$id)->first();
    	if(!empty($data))
    	{
    		Tools::where('id',$id)->delete();
    		return \Redirect::route('admin.tools.index')->with('error','Record deleted successfully!');
    	}
    	else
    	{
    		Tools::where('id',$id)->delete();
    		return \Redirect::route('admin.tools.index')->with('error','Record not found!');
    	}    	
    }

    public function activeRecord($id = null)
    {
        $data = Tools::where('id',$id)->first();
        if(!empty($data))
        {
            Tools::where('id',$id)->update(['status'=>1]);
            return \Redirect::route('admin.tools.index')->with('error','Record active successfully!');
        }
        else
        {
            Tools::where('id',$id)->delete();
            return \Redirect::route('admin.tools.index')->with('error','Record not found!');
        }  
    }

    public function deactiveRecord($id = null)
    {

        $data = Tools::where('id',$id)->first();
        if(!empty($data))
        {
            Tools::where('id',$id)->update(['status'=>0]);
            return \Redirect::route('admin.tools.index')->with('error','Record in-active successfully!');
        }
        else
        {
            Tools::where('id',$id)->delete();
            return \Redirect::route('admin.tools.index')->with('error','Record not found!');
        }  
    }
}
