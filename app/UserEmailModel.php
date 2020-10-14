<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserEmailModel extends Model
{
    //
    use Notifiable;
    protected $table = 'user_email'; 
}
