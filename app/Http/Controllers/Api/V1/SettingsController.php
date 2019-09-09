<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Settings,
    App\Http\Requests\SearchSettings,
    App\Http\Requests\StoreSettings,
    App\Http\Requests\UpdateSettings
;

/**
 * Контроллер районов города
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class SettingsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(SearchSetting $request)
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreSettings $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StoreSettings $request)
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Settings $model
     *
     * @return \App\Http\Resources\SettingResource
     */
    public function show(Settings $model)
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSettings $request
     * @param Settings $model
     *
     * @return \App\Http\Resources\SettingsResource
     */
    public function update(Settings $model, UpdateSettings $request)
    {
        $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Settings $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $model)
    {
        $this->doDestroy($model);
    }
}
