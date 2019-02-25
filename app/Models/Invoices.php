<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoices extends Model
{
    public $timestamps = false;

    protected $table = 'invoices';

    protected $fillable = [
        'client_id',
        'contract_num',
        'number',
        'date',
        'sum',
        'payed',
   	];

    protected $with = ['client'];

    protected $dates = ['date'];

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
     * Get the invoice rows.
     */
    public function rows()
    {
        return $this->hasMany('App\Models\InvoicesRows', 'invoice_id', 'id');
    }
}
