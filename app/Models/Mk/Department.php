<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

     public $timestamps = false;
     
    protected $table = 'department_new';

     public function questions()
     {
         return $this->hasMany('App\Models\Mk\Question', 'department_id', 'id');
     }

    public function question()
    {
        return $this->belongsTo('App\Models\Mk\Question');
    }

    // public function stdep()
    // {
    //     return $this->hasOne('App\Models\StDep')->where('staff_id', '=', $this->id)->where('status', 1);
    // }
}
