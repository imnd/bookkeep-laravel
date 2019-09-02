<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Notifications\Notifiable,
    Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'confirmed',
        'confirm_code',
        'api_token',
   	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'updated_at',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
