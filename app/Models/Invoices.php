<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\HasRows;
//  Carbon\Carbon;

class Invoices extends Model implements HasRows
{
    use \App\Traits\Date;

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

    public $timestamps = false;

//    protected $dates = ['date'];
//
//    public function getDates()
//    {
//        return $this->dates;
//    }

    protected $dateFormat = 'Y-m-d';

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
        return $this->hasMany('App\Models\InvoicesRows', 'invoice_id', 'id');
    }

    /**
     * Получить имя клиента.
     *
     * @param  string $value
     * @return string
     */
    public function getClientAttribute($value)
    {
        return ucfirst($value);
    }
}
