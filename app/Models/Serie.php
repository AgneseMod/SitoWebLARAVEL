<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model 
{
    protected $table='serie_tv_selezionate';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}