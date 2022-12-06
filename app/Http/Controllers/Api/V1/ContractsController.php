<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Contracts;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Contract\{
    Search as SearchContract,
    Store  as StoreContract,
    Update as UpdateContract,
};

/**
 * Контроллер контрактов
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ContractsController extends HasRowsController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchContract $request
     *
     * @return ResourceCollection
     */
    public function index(SearchContract $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreContract $request
     * @return JsonResponse|null
     */
    public function store(StoreContract $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Contracts $model
     * @return JsonResponse
     */
    public function show(Contracts $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Contracts      $model
     * @param UpdateContract $request
     *
     * @return JsonResponse
     */
    public function update(Contracts $model, UpdateContract $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contracts $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Contracts $model): JsonResponse
    {
        return $this->doDestroy($model);
    }

    /**
     * Returns rows of the specified resource.
     *
     * @param Contracts $model
     * @return JsonResponse
     */
    public function getRows(Contracts $model): JsonResponse
    {
        return $this->doGetRows($model);
    }
}
