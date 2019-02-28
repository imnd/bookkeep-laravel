<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model implements QueryConditions
{
    protected $table = 'purchases';

    protected $fillable = [
        'number',
        'date',
        'sum'
   	];

    /**
     * @inheritdoc
     */
    public static function getQueryConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['dateFrom'])) {
            $conditions[] = array('date', '>=', addslashes($params['dateFrom']));
        }
        if (!empty($params['dateTo'])) {
            $conditions[] = array('date', '<=', addslashes($params['dateTo']));
        }
        if (isset($params['number']) && $params['number']!=='') {
            $conditions[] = array('number', '=', addslashes($params['number']));
        }

        return $conditions;
    }
}
