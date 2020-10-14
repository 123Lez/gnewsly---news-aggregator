<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\SurveyUserAnswerModel;
use App\SurveyUserModel;

class SurveyController extends Controller
{
    //

    public function index(Request $request)
    {
    	$input 			=	$request->all();
    	$survey_user 	= 	new SurveyUserModel;
    	$user_info		= 	$input['user_info'];

    	$survey_user->user_browser 	=	$user_info['user_browser'];
    	$survey_user->user_device 	=	$user_info['user_device'];
    	$survey_user->save();

    	return response()->json($survey_user->id);
    }

    public function show(Request $request)
    {
    	$input 		=	$request->all();
    	if(count($input) == 0)
    	{
    		return redirect('mainpage')->with('error','failed to open survey');
    		
    	}
    	else
    	{
    		$user_id 	=	$input['id'];
    		return view('survey')->with('userID',$user_id);
    	}
    	
    }


    public function sendSurvey(Request $request)
    {
    	$input		= 		$request->all();
    	$rules		=		[
    							'watched_video'		=>	'required',
    							'used_platform'		=>	'required',
    							'used_data'			=>	'required',
    							'memes'				=>	'required',
    							'attent_grab'		=>	'required',
    							'blogs'				=>	'required',
    							'news'				=>	'required',
    							'keep_up_interest'	=>	'required',
    							'user_survey_id'	=>	'required'
    						];

    	$user_survey_answer		=	new SurveyUserAnswerModel;

    	$validator = Validator::make($input,$rules);

    	if($validator->passes())
    	{
    		// $userID	=	Auth::user()->id;
    		// dd($userID);
    		$user_survey_answer->survey_user_id		=	$input['user_survey_id'];
    		$user_survey_answer->watched_type_video	=	implode(' | ', $input['watched_video']);
    		$user_survey_answer->used_platforms		=	$input['used_platform'];
    		$user_survey_answer->used_data			=	$input['used_data'];

    		if($input['data_other_comment'] != null)
    		{
    			$user_survey_answer->data_other_comment	=	$input['data_other_comment'];
    		}
    		

    		$user_survey_answer->like_memes			=	$input['memes'];
    		$user_survey_answer->attention_grab		=	implode(' | ', $input['attent_grab']);
    		$user_survey_answer->blogs 				=	$input['blogs'];

    		if($input['blogs_comment'] != null)
    		{
    			$user_survey_answer->blogs_comment	=	$input['blogs_comment'];
    		}


    		$user_survey_answer->news 				=	$input['news'];

    		if($input['news_comment'] != null)
    		{
    			$user_survey_answer->news_comment	=	$input['news_comment'];
    		}

    		$user_survey_answer->keep_up_interest	=	$input['keep_up_interest'];

    		$user_survey_answer->save();

    		return redirect('mainpage')->with('success','Thank you for taking the survery');
    	}  
    	else
    	{
    		return redirect('mainpage')->with('error','failed to save survey')->withInput($input);
    	}


    }
}
