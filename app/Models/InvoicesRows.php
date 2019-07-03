<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Traits\Article,
    App\Traits\Invoice
;

class InvoicesRows extends Model
{
    use Article, Invoice;

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'article_id',
        'quantity',
        'price',
   	];
}
