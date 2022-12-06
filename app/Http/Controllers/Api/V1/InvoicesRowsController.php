<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\InvoicesRows;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\InvoiceRow\{
    Search as SearchInvoiceRow,
    Store as StoreInvoiceRow,
    Update as UpdateInvoiceRow,
};


/**
 * Контроллер позиций фактур
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class InvoicesRowsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchInvoiceRow $request
     *
     * @return ResourceCollection
     */
    public function index(SearchInvoiceRow $request): ResourceCollection
    {
        return $this->doList($request);
    }

    public function list($invoiceId): ResourceCollection
    {
        return new ResourceCollection(InvoicesRows::where('invoice_id', $invoiceId)->get());
    }

    /**
     * Create new model and save in DB.
     * @param StoreInvoiceRow $request
     * @return JsonResponse|null
     */
    public function store(StoreInvoiceRow $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param InvoicesRows $model
     *
     * @return JsonResponse
     */
    public function show(InvoicesRows $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InvoicesRows     $model
     * @param UpdateInvoiceRow $request
     *
     * @return JsonResponse
     */
    public function update(InvoicesRows $model, UpdateInvoiceRow $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InvoicesRows $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(InvoicesRows $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
