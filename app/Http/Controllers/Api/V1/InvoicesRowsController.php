<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\InvoicesRows,
    App\Http\Requests\SearchInvoiceRow,
    App\Http\Requests\StoreInvoiceRow,
    App\Http\Requests\UpdateInvoiceRow
;

use Illuminate\Http\Resources\Json\ResourceCollection;

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
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchInvoiceRow $request)
    {
        return $this->doList($request);
    }

    public function list($invoiceId)
    {
        return new ResourceCollection(InvoicesRows::where('invoice_id', $invoiceId)->get());
    }

    /**
     * Create new model and save in DB.
     * @param StoreInvoiceRow $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreInvoiceRow $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param InvoicesRows $model
     *
     * @return \App\Http\Resources\InvoiceRowResource
     */
    public function show(InvoicesRows $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateInvoiceRow $request
     * @param InvoicesRows $model
     *
     * @return \App\Http\Resources\InvoiceRowResource
     */
    public function update(InvoicesRows $model, UpdateInvoiceRow $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InvoicesRows $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoicesRows $model)
    {
        $this->doDestroy($model);
    }
}
