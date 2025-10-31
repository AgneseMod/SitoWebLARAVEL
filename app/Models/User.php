<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    public function Film()
    {
        return $this->hasMany('App\Models\Film');
       
    }
    
    public function Serie()
    {
       
        return $this->hasMany('App\Models\Serie');
    }
}

