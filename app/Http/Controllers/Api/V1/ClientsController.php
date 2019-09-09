<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Clients,
    App\Http\Requests\SearchClient,
    App\Http\Requests\StoreClient,
    App\Http\Requests\UpdateClient
;

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
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchClient $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreClient $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreClient $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Clients $model
     *
     * @return \App\Http\Resources\ClientResource
     */
    public function show(Clients $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateClient $request
     * @param Clients $model
     *
     * @return \App\Http\Resources\ClientResource
     */
    public function update(Clients $model, UpdateClient $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Clients $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $model)
    {
        $this->doDestroy($model);
    }
}
