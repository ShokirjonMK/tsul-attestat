<?php

namespace App\Models\Mk;

use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    protected $table = 'password';

    protected $fillable = [
        'username',
        'password',
    ];
}
