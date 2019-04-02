<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasesRows extends Model
{
    protected $table = 'purchase_rows';

    public $timestamps = false;

    protected $fillable = [
        'purchase_id',
        'article_subcategory_id',
        'quantity',
        'price',
   	];

    /**
     * Get the article.
     */
    /*public function article()
    {
        return $this->hasOne('App\Models\ArticleSubcats', 'article_subcategory_id');
    }*/
}
