<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    //Carbon\Carbon,
    App\Contracts\QueryConditions,
    App\Traits\Client;

class Bills extends Model implements QueryConditions
{
    use Client;

    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'contract_num',
        'sum',
        'remainder',
        'date',
        'contents',
   	];

    protected $with = ['client'];

    /*protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }*/

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
        foreach (['contract_num', 'client_id'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
