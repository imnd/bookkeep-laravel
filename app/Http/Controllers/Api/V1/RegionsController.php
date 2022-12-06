<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Regions;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Region\{
    Search as SearchRegion,
    Store as StoreRegion,
    Update as UpdateRegion,
};

/**
 * Контроллер районов города
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class RegionsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchRegion $request
     *
     * @return ResourceCollection
     */
    public function index(SearchRegion $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreRegion $request
     * @return JsonResponse|null
     */
    public function store(StoreRegion $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Regions $model
     *
     * @return JsonResponse
     */
    public function show(Regions $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Regions      $model
     * @param UpdateRegion $request
     *
     * @return JsonResponse
     */
    public function update(Regions $model, UpdateRegion $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Regions $model
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Regions $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
