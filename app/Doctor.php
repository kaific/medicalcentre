<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    // Table Name
    protected $table = 'doctors'; //default
    // Primary Key
    public $primarykey = 'id'; //default
    // Timestamps
    public $timestamps = true; //default

    // Many-to-Many
    public function patients(){
        return $this->belongsToMany('App\Patient');
    }
}
