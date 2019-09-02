<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\QueryConditions;

class Regions extends Model implements QueryConditions
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
   	];

    /**
     * @inheritdoc
     */
    public static function getSearchConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['name'])) {
            $conditions[] = array('name', 'like', '%' . addslashes($params['name']). '%');
        }
        return $conditions;
    }
}
