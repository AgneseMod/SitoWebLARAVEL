<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table='film_salvati';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}