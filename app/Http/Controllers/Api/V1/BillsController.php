<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Bills,
    App\Http\Requests\SearchBill,
    App\Http\Requests\StoreBill,
    App\Http\Requests\UpdateBill
;

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
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchBill $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreBill $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreBill $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Bills $model
     *
     * @return \App\Http\Resources\BillResource
     */
    public function show(Bills $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBill $request
     * @param Bills $model
     *
     * @return \App\Http\Resources\BillResource
     */
    public function update(Bills $model, UpdateBill $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bills $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bills $model)
    {
        $this->doDestroy($model);
    }
}
