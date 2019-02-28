<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contracts extends Model implements QueryConditions
{
    public $timestamps = false;

    protected $table = 'contracts';

    protected $fillable = [
        'contract_num',
        'client_id',
        'sum',
        'payed',
        'date',
        'term_start',
        'term_end',
        'type',
   	];

    protected $with = ['client'];

    protected $dates = ['date', 'term_start', 'term_end'];

    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Get the client.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'client_id');
    }

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
        foreach (['number', 'client_id'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
