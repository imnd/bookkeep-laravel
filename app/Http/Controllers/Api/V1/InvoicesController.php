<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Invoices,
    App\Http\Requests\SearchInvoice,
    App\Http\Requests\StoreInvoice,
    App\Http\Requests\UpdateInvoice
;

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
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchInvoice $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreInvoice $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreInvoice $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Invoices $model
     *
     * @return \App\Http\Resources\InvoiceResource
     */
    public function show(Invoices $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\StoreInvoice $request
     * @param Invoices $model
     *
     * @return \App\Http\Resources\InvoiceResource
     */
    public function update(Invoices $model, UpdateInvoice $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoices $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $model)
    {
        $this->doDestroy($model);
    }
}
