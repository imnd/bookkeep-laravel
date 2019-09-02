<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows,
    App\Traits\Client
;

class Contracts extends Model implements HasRows
{
    use Client;

    public $timestamps = false;

    protected $fillable = [
        'client_id',
        'contract_num',
        'sum',
        'payed',
        'date',
        'term_start',
        'term_end',
        'type',
   	];

    protected $with = ['client'];

    /*protected $dates = ['date', 'term_start', 'term_end'];

    public function getDates()
    {
        return $this->dates;
    }*/

    # relations

    /**
     * Get the invoice rows.
     */
    public function rows()
    {
        return $this->hasMany(ContractsRows::class, 'contract_id', 'id');
    }
}
