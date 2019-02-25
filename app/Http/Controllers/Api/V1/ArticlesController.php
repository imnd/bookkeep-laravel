<?php
namespace App\Http\Controllers\Api\V1;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ArticlesController extends ApiController
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'App\Models\Articles';
    /**
     * @inheritdoc
     */
    protected $collectionName = 'App\Http\Resources\ArticleCollection';
}
