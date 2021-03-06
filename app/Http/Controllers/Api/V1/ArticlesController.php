<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Articles,
    App\Http\Requests\SearchArticle,
    App\Http\Requests\StoreArticle,
    App\Http\Requests\UpdateArticle
;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ArticlesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchArticle $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreArticle $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreArticle $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Articles $model
     *
     * @return \App\Http\Resources\ArticleResource
     */
    public function show(Articles $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StoreArticle $request
     * @param Articles $model
     *
     * @return \App\Http\Resources\ArticleResource
     */
    public function update(Articles $model, UpdateArticle $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Articles $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $model)
    {
        $this->doDestroy($model);
    }
}
