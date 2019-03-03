<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows;

//use Carbon\Carbon;

class Contracts extends Model implements HasRows
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

    # relations

    /**
     * Get the client.
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'client_id');
    }

    /**
     * Get the invoice rows.
     */
    public function rows()
    {
        return $this->hasMany('App\Models\ContractsRows', 'contract_id', 'id');
    }
}
