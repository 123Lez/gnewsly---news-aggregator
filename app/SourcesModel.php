<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourcesModel extends Model
{
    //
    protected $table = 'sources';
    const ENCA = 1;
    const SUPERSPORT = 2;
    const ZALEBS = 3;
    const NEWS24 = 4; 
    const SOWETANLIVE = 5;
    const BBC = 6;
    const THESOUTHAFRICAN = 7;
}
