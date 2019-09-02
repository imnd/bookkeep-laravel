<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\QueryConditions;

class ArticleSubcats extends Model implements QueryConditions
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
        return $this->belongsTo(ArticleCats::class, 'cat_id');
    }

    /**
     * @inheritdoc
     */
    public static function getSearchConditions(array $params): array
    {
        $conditions = array();
        return $conditions;
    }
}
