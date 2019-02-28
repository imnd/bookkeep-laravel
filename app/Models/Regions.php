<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model implements QueryConditions
{
    protected $table = 'regions';

    protected $fillable = [
        'name', 'description',
   	];

    /**
     * @inheritdoc
     */
    public static function getQueryConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['name'])) {
            $conditions[] = array('name', 'like', '%' . addslashes($params['name']). '%');
        }
        return $conditions;
    }
}
