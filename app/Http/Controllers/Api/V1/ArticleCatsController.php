<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\ArticleCats,
    App\Http\Requests\SearchArticle,
    App\Http\Requests\StoreArticle,
    App\Http\Requests\UpdateArticle
;

/**
 * Контроллер подкатегорий товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ArticleCatsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchArticleCat $request
     * 
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchArticleCat $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * 
     * @param StoreArticleCat $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreArticleCat $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param ArticleCats $model
     *
     * @return \App\Http\Resources\ArticleCatResource
     */
    public function show(ArticleCats $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateArticleCat $request
     * @param ArticleCats $model
     *
     * @return \App\Http\Resources\ArticleCatResource
     */
    public function update(ArticleCats $model, UpdateArticleCat $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ArticleCats $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCats $model)
    {
        $this->doDestroy($model);
    }
}
