<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    // Table Name
    protected $table = 'visits'; //default
    // Primary Key
    public $primarykey = 'id'; //default
    // Timestamps
    public $timestamps = true; //default

    public function user(){
        return $this->belongsTo('App\User');
    }
}
