<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasesRows extends Model
{
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
    public function articleSubcat()
    {
        return $this->hasOne(ArticleSubcats::class, 'article_subcategory_id');
    }
}
