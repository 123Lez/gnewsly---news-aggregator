<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTokenModel;
use App\lastSentNotficationModel;
use App\SourcesContentModel;

class PushNotificationController extends Controller
{
    //
    protected function get_user_tokens()
    {
    	//Fetch all the user tokens from the DB to send 
    	//push Notifications to.
    	$Tokens 		=	UserTokenModel::all();
    	$user_token_arr	=	array();
    	foreach($Tokens as $value)
    	{
    		array_push($user_token_arr,$value['token']);
    	}
    	//return the list of tokens
    	return $user_token_arr;
    }

    protected function check_last_sent_Notification($id)
    {
    	//Check when last notification was sent
    	$last_sent_ID = lastSentNotficationModel::OrderBy('id','desc')->first();
    	//if last_sent_id is less than ID it means notification has not been sent
    	if($last_sent_ID['last_sent_id'] < $id)
    	{
    		$update_id					=	new lastSentNotficationModel;
    		$update_id->last_sent_id 	= $id;
    		$update_id->save();
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function send_Notification()
    {
    	$article_id					= 	SourcesContentModel::OrderBy('id','desc')->first();
    	$check_to_send_notification = 	$this->check_last_sent_Notification($article_id['id']);
    	if($check_to_send_notification == true)
    	{
    		$user_tokens 	=	$this->get_user_tokens();
    		$api_key		=	'AIzaSyB49N4iOuHFNXJj4PzYuqGgvwUhx0bEHXA';
    		$key 			=	'AAAAiAa0kZ0:APA91bGHTgfhXiyJneJRY83qPK68Frx4LNE-pfNVeHMmxMau_8wlb9NXIP6VOXqBwTac-V6FvygBnT8XClFbb0mzRZNtlkFsK2CbIshe1Ry7dX9HpTvFOQoOPnxQ2zgMZjnvUS9jIycs';

    		$header			= 	array(
    									'Authorization:key='.$key,
    									'Content-Type:application/json'
    							);

    		$url			= 	'https://fcm.googleapis.com/fcm/send';

    		foreach ($user_tokens as $token) 
    		{
    			$body		=	array(
    									'to' 			=>		$token,
    									'data'	=>		array(
    																	'title'	=>	'Gnewsly',
    																	'body'	=>	$article_id['title'],
    																	'icon'	=>	'img/icons/icon-72x72.png',
    																	'badge'	=>	'img/icons/icon-72x72.png'
    																	),
    									'priority'		=>		'high'
    							);

    			$curl 		= 	curl_init();
    			curl_setopt($curl, CURLOPT_URL,$url);
    			curl_setopt($curl, CURLOPT_POST,true);
    			curl_setopt($curl, CURLOPT_HEADER, false);
    			curl_setopt($curl, CURLOPT_HTTPHEADER,$header);
    			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    			//Enabling SSL certificate support
    			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    			curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($body));

    			$exe_curl	=	curl_exec($curl);

    			if($exe_curl  === FALSE)
    			{
    				dd('Curl request failed: '.curl_error($curl));
    			}
    			$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    			dd('The HTTP code: '.$code);
    			curl_close($curl);

    		}

    		

    		

    	}
    	else
    	{
    		dd('Notification was already sent');
    	}
    	
    }
}
