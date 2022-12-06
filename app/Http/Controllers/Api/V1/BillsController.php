<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Bills,
    Illuminate\Http\JsonResponse,
    Illuminate\Http\Resources\Json\ResourceCollection;

use App\Http\Requests\Bill\{
    Search as SearchBill,
    Store as StoreBill,
    Update as UpdateBill,
};

/**
 * Контроллер счетов
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class BillsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchBill $request
     *
     * @return ResourceCollection
     */
    public function index(SearchBill $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreBill $request
     * @return JsonResponse|null
     */
    public function store(StoreBill $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Bills $model
     *
     * @return JsonResponse
     */
    public function show(Bills $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Bills      $model
     * @param UpdateBill $request
     *
     * @return JsonResponse
     */
    public function update(Bills $model, UpdateBill $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bills $model
     *
     * @return JsonResponse
     *@throws \Exception
     */
    public function destroy(Bills $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
