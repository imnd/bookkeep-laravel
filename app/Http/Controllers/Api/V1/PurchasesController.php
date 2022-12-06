<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Purchases;
use Exception;
use App\Http\Requests\Purchase\{
    Search as SearchPurchase,
    Store as StorePurchase,
    Update as UpdatePurchase,
};
use Illuminate\Http\{
    JsonResponse,
    Resources\Json\ResourceCollection
};

/**
 * Контроллер закупок
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class PurchasesController extends HasRowsController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchPurchase $request
     *
     * @return ResourceCollection
     */
    public function index(SearchPurchase $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StorePurchase $request
     * @return JsonResponse|null
     */
    public function store(StorePurchase $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Purchases $model
     *
     * @return JsonResponse
     */
    public function show(Purchases $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Purchases      $model
     * @param UpdatePurchase $request
     *
     * @return JsonResponse
     */
    public function update(Purchases $model, UpdatePurchase $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Purchases $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Purchases $model): JsonResponse
    {
        return $this->doDestroy($model);
    }

    /**
     * Returns rows of the specified resource.
     *
     * @param Purchases $model
     * @return JsonResponse
     */
    public function getRows(Purchases $model): JsonResponse
    {
        return $this->doGetRows($model);
    }
}
