<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SourcesContentModel;
use App\CategoryModel;
use App\WebPush\WebPush;
use App\WebPush\Subscription;
use App\UserTokenModel;

class MainpageController extends Controller
{
    //If there are duplicates of the article remove from database
    private function remove_duplicates($title)
    {
        $dontDeleteThisRow = SourcesContentModel::where('title',$title)->first();
        $title_duplicate = SourcesContentModel::where('title',$title)->where('id','!=', $dontDeleteThisRow->id)->delete();

    }
    public function fetchArticles(Request $request)
    {

    	// $data = SourcesContentModel::orderBy('id','desc')->paginate(9);
        $trending_data = SourcesContentModel::orderBy('id','desc')->paginate(9);
        $entertainment_data = SourcesContentModel::where('category','=',CategoryModel::ENTERTAINMENT)
                                                   ->take(4)->orderBy('id','desc')->get();
        $travel_data = SourcesContentModel::where('category','=',CategoryModel::TRAVEL)
                                            ->take(4)->orderBy('id','desc')->get();
        $business_data = SourcesContentModel::where('category','=',CategoryModel::BUSINESS)
                                              ->take(4)->orderBy('id','desc')->get();

        $data = array('data'            =>$trending_data,
                      'entertainment'   => $entertainment_data,
                      'travel'          => $travel_data,
                      'business'        => $business_data

                );
    
    	// return view('mainpage')->with('data',$data);
        return view('mainpage',$data);
    }
    
    public function viewArticle($id)
    {
    	$article_data = SourcesContentModel::where('id',$id)->get();

    	return view('articleview')->with('articles',$article_data);
    }
    public function send_User_Token(Request $request)
    {
        $input = $request->all();
        $check_token_exist = UserTokenModel::where('token','=',$input['user_token'])->get();

        if(count($check_token_exist) > 0 )
        {
            return response()->json('Token already exist');

        }
        else
        {
            $user_sent_token        = new UserTokenModel;
            $user_sent_token->token = $input['user_token'];
            $user_sent_token->save();
            return response()->json('token saved to database');
        }
    }
   
}
