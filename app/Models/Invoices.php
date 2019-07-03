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

    protected $table = 'invoices';

    protected $fillable = [
        'client_id',
        'contract_num',
        'number',
        'sum',
        'payed',
        'date',
    ];

    protected $with = ['client'];

    //protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }

    protected $dateFormat = 'Y-m-d';

    /**
     * validation rules
     * 
     * @return array
     */
    public static function getRules()
    {
        return [
            'client_id' => 'required|numeric',
            'contract_num' => 'required|numeric',
            'number' => 'required|numeric',
            'sum' => 'numeric',
            'payed' => 'numeric',
            'date' => 'required|date',
            'rows' => 'array',
        ];
    }

    # relations

    /**
     * Get the invoice rows.
     */
    public function rows()
    {
        return $this->hasMany(InvoicesRows::class, 'invoice_id', 'id');
    }
}
