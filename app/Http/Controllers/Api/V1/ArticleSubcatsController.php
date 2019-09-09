<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\ArticleSubcats,
    App\Http\Requests\SearchArticleSubcat,
    App\Http\Requests\StoreArticleSubcat,
    App\Http\Requests\UpdateArticleSubcat
;

/**
 * Контроллер подкатегорий товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ArticleSubcatsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function list(SearchArticleSubcat $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreArticleSubcat $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreArticleSubcat $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param ArticleSubcats $model
     *
     * @return \App\Http\Resources\ArticleSubcatResource
     */
    public function show(ArticleSubcats $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateArticleSubcat $request
     * @param ArticleSubcats $model
     *
     * @return \App\Http\Resources\ArticleSubcatResource
     */
    public function update(ArticleSubcats $model, UpdateArticleSubcat $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ArticleSubcats $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleSubcats $model)
    {
        $this->doDestroy($model);
    }
}
