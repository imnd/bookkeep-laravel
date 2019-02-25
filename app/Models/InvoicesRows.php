<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicesRows extends Model
{
    public $timestamps = false;

    protected $table = 'invoices_rows';

    protected $fillable = [
        'invoice_id',
        'article_id',
        'quantity',
        'price',
   	];

    /**
     * Get the article.
     */
    public function article()
    {
        return $this->hasOne('App\Models\Articles', 'article_id');
    }

    /**
     * Get the invoice.
     */
    public function invoice()
    {
        return $this->hasOne('App\Models\Invoices', 'invoice_id');
    }
}
