<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases';

    protected $fillable = [
        'number',
        'date',
        'sum'
   	];
}
