<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Tools;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$dataTools = Categories::with(['tools'=>function($q)
            {
                $q->where(['status'=>1]);
            }])->where(['status'=>1])->get(); 
    	//return view('include\front_header')->with('dataTools', $dataTools);
        return view('welcome',compact('dataTools'));
    }


    public function toolSearch(Request $request)
    {
        $reqData = $request->all();
        $result = [];
        if(!empty($reqData['keyword']))
        {
            $data = Tools::where('title', 'like', '%' . $reqData['keyword'] . '%')->get();
            if(!empty($data))
            {
                $i = 0;
                foreach ($data as $key => $value)
                {
                    $result[$i]['tool_title'] = isset($value->title)?$value->title:'';
                    $result[$i]['short_description'] = isset($value->short_description)?$value->short_description:'';
                    $route = route($value->slug);
                    $result[$i]['url'] = $route;
                    $i++;
                }
            }
            else
            {
                $result['status'] = 200;
                $result['message'] = 'No tool found!';
                $result['data'] = [];
            }
        }
        else
        {
            $result['status'] = 500;
            $result['message'] = 'Please enter keyword to search tool!';
            $result['data'] = [];
        }
        return $result;
    }
}
