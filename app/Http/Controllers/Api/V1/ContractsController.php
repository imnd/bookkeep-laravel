<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Contracts,
    App\Http\Requests\SearchContract,
    App\Http\Requests\StoreContract,
    App\Http\Requests\UpdateContract
;

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
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchContract $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreContract $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreContract $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Contracts $model
     *
     * @return \App\Http\Resources\ContractResource
     */
    public function show(Contracts $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateContract $request
     * @param Contracts $model
     *
     * @return \App\Http\Resources\ContractResource
     */
    public function update(Contracts $model, UpdateContract $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contracts $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contracts $model)
    {
        $this->doDestroy($model);
    }
}
