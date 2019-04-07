<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicesRows extends Model
{
    use \App\Traits\Article,
        \App\Traits\Invoice;

    public $timestamps = false;

    protected $table = 'invoice_rows';

    protected $fillable = [
        'invoice_id',
        'article_id',
        'quantity',
        'price',
   	];
}
