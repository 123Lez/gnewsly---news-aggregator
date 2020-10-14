<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\UserEmailModel;
use App\Notifications\EmailNotification;
use App\User;

class EmailController extends Controller
{
    //
    public function sendInitial_email(Request $request)
    {
        // set_time_limit(300000);
        $input  = $request->all();
        $rule   = [
                    'email_sign_up' =>  'required|email'
                    ];

        $validator = Validator::make($input,$rule);
        $email_address = UserEmailModel::where('email','=',$input['email_sign_up'])->get();
        if($validator->passes())
        {
            if(count($email_address) > 0)
            {
                return back()->with('warning','Such user already exist');
            }
            else
            {
                // $emails = new UserEmailModel;

                // $emails->email  =   $input['email_sign_up'];
                // $emails->save();

                Mail::to($input['email'])->send(new sendMail($input['email_sign_up']));
                return back()->with('success','A confirmation message has been sent to your email');
            }
            
        }
        else
        {
            return back()->with('error','Failed to sign you up!!');
        }
    	
    }

    //Confirm the user's email address
    public function confirmEmail(Request $request)
    {
        $input  = $request->all();
        $email_address = UserEmailModel::where('email','=',$input['email'])->get();
        if(count($email_address) > 0)
        {
            return redirect('category?source=News')->with('error','Such user already exist');
        }
        else
        {
            $emails = new UserEmailModel;
            $emails->email  =   $input['email'];
            $emails->save();
            return redirect('category?source=News')->with('success','Account successfully confirmed!!!'); 
        }
       
    }

    public function emailNotification()
    {
        $user_emails = UserEmailModel::first();
        $user        = User::first();
        // Notification::send(new EmailNotification($user_emails['email']));
        $user_emails->notify(new EmailNotification($user_emails['email']));
        
    }
}
