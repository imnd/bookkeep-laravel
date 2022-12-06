<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Articles;
use Exception;
use Illuminate\Http\{
    JsonResponse,
    Resources\Json\ResourceCollection
};
use App\Http\Requests\Article\{
    Search as SearchArticle,
    Store as StoreArticle,
    Update as UpdateArticle,
};

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
     * @param SearchArticle $request
     * @return ResourceCollection
     */
    public function index(SearchArticle $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     *
     * @param StoreArticle $request
     * @return JsonResponse|null
     */
    public function store(StoreArticle $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Articles $model
     * @return JsonResponse
     */
    public function show(Articles $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Articles      $model
     * @param UpdateArticle $request
     *
     * @return JsonResponse
     */
    public function update(Articles $model, UpdateArticle $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Articles $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Articles $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
