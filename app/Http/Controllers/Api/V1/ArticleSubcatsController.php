<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\ArticleSubcats;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\ArticleSubcat\{
    Search as SearchArticleSubcat,
    Store as StoreArticleSubcat,
    Update as UpdateArticleSubcat,
};

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
     * @param SearchArticleSubcat $request
     *
     * @return ResourceCollection
     */
    public function index(SearchArticleSubcat $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreArticleSubcat $request
     * @return JsonResponse|null
     */
    public function store(StoreArticleSubcat $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param ArticleSubcats $model
     *
     * @return JsonResponse
     */
    public function show(ArticleSubcats $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleSubcats      $model
     * @param UpdateArticleSubcat $request
     *
     * @return JsonResponse
     */
    public function update(ArticleSubcats $model, UpdateArticleSubcat $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ArticleSubcats $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(ArticleSubcats $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
