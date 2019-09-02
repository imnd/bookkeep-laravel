<?php
namespace App\Http\Controllers\Api\V1;

use
    App\Models\Purchases,
    App\Http\Requests\SearchPurchase,
    App\Http\Requests\StorePurchase,
    App\Http\Requests\UpdatePurchase
;

/**
 * Контроллер закупок
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class PurchasesController extends HasRowsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function list(SearchPurchase $request)
    {
        return $this->makeList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StorePurchase $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function store(StorePurchase $request)
    {
        return $this->makeStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Purchases $model
     *
     * @return \App\Http\Resources\PurchaseResource
     */
    public function show(Purchases $model)
    {
        return $this->makeShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePurchase $request
     * @param Purchases $model
     *
     * @return \App\Http\Resources\PurchaseResource
     */
    public function update(Purchases $model, UpdatePurchase $request)
    {
        $this->makeUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Purchases $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchases $model)
    {
        $this->makeDestroy($model);
    }
}
