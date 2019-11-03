<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $casts = [
        'options' => 'json',
    ];
}
