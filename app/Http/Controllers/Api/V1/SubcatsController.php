<?php
namespace App\Http\Controllers\Api\V1;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class SubcatsController extends ApiController
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'App\Models\ArticleSubcats';
    /**
     * @inheritdoc
     */
    protected $collectionName = 'App\Http\Resources\ArticleSubcatCollection';
}
