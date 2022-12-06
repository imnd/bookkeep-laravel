<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\ArticleCats;
use Exception;
use Illuminate\Http\{
    JsonResponse,
    Resources\Json\ResourceCollection
};
use App\Http\Requests\ArticleCat\{
    Search as SearchArticleCat,
    Store as StoreArticleCat,
    Update as UpdateArticleCat,
};

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
     * @return ResourceCollection
     */
    public function index(SearchArticleCat $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     *
     * @param StoreArticleCat $request
     * @return JsonResponse|null
     */
    public function store(StoreArticleCat $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param ArticleCats $model
     *
     * @return JsonResponse
     */
    public function show(ArticleCats $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArticleCat $request
     * @param ArticleCats $model
     *
     * @return JsonResponse
     */
    public function update(ArticleCats $model, UpdateArticleCat $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ArticleCats $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(ArticleCats $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
