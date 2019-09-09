<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Regions,
    App\Http\Requests\SearchRegion,
    App\Http\Requests\StoreRegion,
    App\Http\Requests\UpdateRegion
;

/**
 * Контроллер районов города
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class RegionsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchRegion $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreRegion $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreRegion $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Regions $model
     *
     * @return \App\Http\Resources\RegionResource
     */
    public function show(Regions $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRegion $request
     * @param Regions $model
     *
     * @return \App\Http\Resources\RegionResource
     */
    public function update(Regions $model, UpdateRegion $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Regions $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regions $model)
    {
        $this->doDestroy($model);
    }
}
