<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows;

class Contracts extends Model implements HasRows
{
    use \App\Traits\Client;

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
     * validation rules
     * 
     * @return array
     */
    public function getRules()
    {
        return [
            'client_id,contract_num' => 'required|numeric',
            'sum,payed' => 'numeric',
            'date,term_start,term_end' => 'date',
            'type' => 'string|max:6',
        ];
    }

    # relations

    /**
     * Get the invoice rows.
     */
    public function rows()
    {
        return $this->hasMany('App\Models\ContractsRows', 'contract_id', 'id');
    }
}
