<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\QueryConditions;

class ArticleCats extends Model implements QueryConditions
{
    public $timestamps = false;

    protected $table = 'article_cats';

    protected $fillable = [
        'name',
    	'description',
   	];

    /**
     * @inheritdoc
     */
    public static function getSearchConditions(array $params): array
    {
        $conditions = array();
        return $conditions;
    }
}
