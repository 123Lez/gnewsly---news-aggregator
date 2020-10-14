<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    //
    protected $table = 'category';
    const ENTERTAINMENT = 1;
    const TRAVEL = 3;
    const TECHNOLOGY = 5;
    const SPORTS = 4;
    const BUSINESS = 2;
}
