<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Table Name
    protected $table = 'patients'; //default
    // Primary Key
    public $primarykey = 'id'; //default
    // Timestamps
    public $timestamps = true; //default

    // Many-to-Many
    public function doctors(){
        return $this->belongsToMany('App\Doctor');
    }
}
