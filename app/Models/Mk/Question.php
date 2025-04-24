<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{

     public $timestamps = false;
    protected $fillable = ['question', 'type', 'department_id', 'file'];
     
    protected $table = 'question';

    public function department()
    {
        return $this->belongsTo('App/Models/Mk/Department');
    }
}
