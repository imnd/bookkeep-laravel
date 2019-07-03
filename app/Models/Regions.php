<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description',
   	];

    /**
     * validation rules
     *
     * @return array
     */
    public static function getRules(): array
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required',
        ];
    }
}
