<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    Illuminate\Notifications\Notifiable,
    Illuminate\Foundation\Auth\User as Authenticatable,
    App\Contracts\QueryConditions;

class Users extends Authenticatable implements QueryConditions
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

    /**
     * @inheritdoc
     */
    public static function getSearchConditions(array $params): array
    {
        $conditions = array();

        if (!empty($params['name'])) {
            $conditions[] = array('name', 'LIKE', '%' . addslashes($params['name']). '%');
        }
        if (!empty($params['email'])) {
            $conditions[] = array('email', '=', addslashes($params['email']));
        }

        return $conditions;
    }
}
