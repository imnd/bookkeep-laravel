<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'key', 'value',
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
            'key' => 'required',
            'value' => 'required',
        ];
    }
}
