<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Questionall extends Model
{

     public $timestamps = false;

     
    protected $table = 'questionall_new';

    public function department()
    {
        return $this->belongsTo('App/Models/Mk/Department');
    }
}
