<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows,
    App\Traits\Date,
    App\Traits\Client
    /*Carbon\Carbon*/
;

class Invoices extends Model implements HasRows
{
    use Date, Client;

    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'contract_num',
        'number',
        'sum',
        'payed',
        'date',
    ];

    protected $with = ['client'];

    /*protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }*/

    protected $dateFormat = 'Y-m-d';

    /**
     * Get the invoice rows.
     */
    public function rows()
    {
        return $this->hasMany(InvoicesRows::class, 'invoice_id', 'id');
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['dateFrom'])) {
            $conditions[] = array('date', '>=', addslashes($params['dateFrom']));
        }
        if (!empty($params['dateTo'])) {
            $conditions[] = array('date', '<=', addslashes($params['dateTo']));
        }
        foreach (['number', 'contract_num', 'client_id'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
