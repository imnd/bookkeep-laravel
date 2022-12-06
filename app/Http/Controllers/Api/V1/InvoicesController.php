<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Invoices;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Invoice\{
    Search as SearchInvoice,
    Store  as StoreInvoice,
    Update as UpdateInvoice,
};

/**
 * Контроллер фактур
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class InvoicesController extends HasRowsController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchInvoice $request
     *
     * @return ResourceCollection
     */
    public function index(SearchInvoice $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     *
     * @param StoreInvoice $request
     * @return JsonResponse|null
     */
    public function store(StoreInvoice $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Returns the specified resource.
     *
     * @param Invoices $model
     * @return JsonResponse
     */
    public function show(Invoices $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Invoices      $model
     * @param UpdateInvoice $request
     *
     * @return JsonResponse
     */
    public function update(Invoices $model, UpdateInvoice $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoices $model
     * @return JsonResponse
     *
     * @throws Exception
     */
    public function destroy(Invoices $model): JsonResponse
    {
        return $this->doDestroy($model);
    }

    /**
     * Returns rows of the specified resource.
     *
     * @param Invoices $model
     * @return JsonResponse
     */
    public function rows(Invoices $model): JsonResponse
    {
        return $this->doGetRows($model);
    }
}
