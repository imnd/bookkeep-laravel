<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicesRows extends Model
{
    protected $table = 'invoices_rows';

    protected $fillable = [
        'invoice_id',
        'article_id',
   	];

    /**
     * Get the article.
     */
    public function article()
    {
        return $this->hasOne('App\Models\Articles', 'article_id');
    }
}
