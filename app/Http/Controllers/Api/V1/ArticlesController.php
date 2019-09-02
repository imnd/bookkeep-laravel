<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Articles,
    App\Http\Resources\ArticleCollection,
    App\Http\Requests\StoreArticle;

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
     * @return \App\Http\Resources\ArticleCollection
     */
    public function index()
    {
        return ArticleCollection::make(
            Articles::paginate(10)
        );
    }

    /**
     * Create new model and save in DB.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreArticle $request)
    {
        $article = Articles::create(
            $request->validated()
        );
        return ArticleResource::make($article)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Articles $article
     *
     * @return \App\Http\Resources\ArticleResource
     */
    public function show(Articles $article)
    {
        return ArticleResource::make($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StoreArticle $request
     * @param \App\Articles $article
     *
     * @return \App\Http\Resources\ArticleResource
     */
    public function update(StoreArticle $request, Articles $article)
    {
        $article->fill(
            $request->validated()
        )
        ->save();

        return ArticleResource::make($article);
    }
}
