<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoices extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'client_id',
        'number',
        'date',
        'contract_num',
        'sum',
        'payed',
   	];

    protected $dates = ['date'];

    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Get the article.
     */
    public function article()
    {
        return $this->hasOne('App\Models\Articles', 'article_id');
    }
}
