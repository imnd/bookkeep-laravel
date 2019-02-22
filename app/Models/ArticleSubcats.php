<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSubcats extends Model
{
    public $timestamps = false;

    protected $table = 'article_subcats';

    protected $fillable = [
        'name', 'cat_id'
   	];

    /**
     * Get the category.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\ArticleCats', 'cat_id');
    }
}
