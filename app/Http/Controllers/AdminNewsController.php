<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\MOdels\News;

class AdminNewsController extends Controller
{
    public function newsCreate(){

    	return view('admin.news');
    }

    public function newsUpdate(Request $request){

    	$this->validate($request, 
    		[
    			'newstitle' => 'required',
    			'newsBody' => 'required'
    		],

    		[
    			'newstitle.required'=> 'Please fillup the Titile properly!',
    			'newsBody.required'=> 'Please write the News properly!'
    		]
        );

    	$news = new News();
    	$news -> $request->newstitle;
    	$news -> $request->newsBody;
    	$news -> save();

    	return view('admin.news');
    }
}
