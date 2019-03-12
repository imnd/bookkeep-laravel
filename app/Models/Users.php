<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password', 'confirmed', 'confirm_code', 'api_token',
   	];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
