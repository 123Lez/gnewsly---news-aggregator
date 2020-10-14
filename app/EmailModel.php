<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\SignUpMail;
use Illuminate\Support\Facades\Mail;

class EmailModel extends Model
{
    //
    public static function sendEmail($toAddress, $subject, $body)
    {
    	$email = array('email_address' => $toAddress, 'subject' => $subject, 'email_body' => $body);
        Mail::send(array(), array(), function ($message) use ($email) {
            $message->from('lesegomahlatsi363@gmail.com', 'gnewsly');
            $message->to($email['email_address']);
            $message->subject($email['subject']);
            $message->setBody($email['email_body'], 'text/html');
        });
    }
}
