<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDep extends Model
{

    public $timestamps = false;

    protected $table = 'user_dep';

    public function department()
    {
        return $this->belongsTo('App/Models/Mk/Department', 'id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
