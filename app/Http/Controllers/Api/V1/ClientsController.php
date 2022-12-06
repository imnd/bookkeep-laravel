<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Clients,
    Exception,
    Illuminate\Http\JsonResponse,
    Illuminate\Http\Resources\Json\ResourceCollection
;
use App\Http\Requests\Client\{
    Search as SearchClient,
    Store as StoreClient,
    Update as UpdateClient,
};

/**
 * Контроллер клиентов
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ClientsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchClient $request
     *
     * @return ResourceCollection
     */
    public function index(SearchClient $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     *
     * @param StoreClient $request
     * @return JsonResponse|null
     */
    public function store(StoreClient $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Clients $model
     * @return JsonResponse
     */
    public function show(Clients $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClient $request
     * @param Clients      $model
     *
     * @return JsonResponse
     */
    public function update(Clients $model, UpdateClient $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Clients $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Clients $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
