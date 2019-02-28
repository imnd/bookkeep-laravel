<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model implements QueryConditions
{
    protected $table = 'settings';

    protected $fillable = [
        'name', 'key', 'value',
   	];
}
