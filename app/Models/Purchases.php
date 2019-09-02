<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows,
    App\Contracts\QueryConditions;

/**
 * Закупки
 */
class Purchases extends Model implements HasRows, QueryConditions
{
    public $timestamps = false;

    protected $fillable = [
        'number',
        'sum',
        'date',
   	];

    /**
     * Get the purchase rows.
     */
    public function rows()
    {
        return $this->hasMany(PurchasesRows::class, 'purchase_id', 'id');
    }

    /**
     * @inheritdoc
     */
    public static function getSearchConditions(array $params): array
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
