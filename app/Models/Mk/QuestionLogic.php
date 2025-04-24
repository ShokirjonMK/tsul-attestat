<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuestionLogic extends Model
{

    public $timestamps = false;


    protected $table = 'questions_logic';

    public function department()
    {
        return $this->belongsTo('App/Models/Mk/Department');
    }
}
