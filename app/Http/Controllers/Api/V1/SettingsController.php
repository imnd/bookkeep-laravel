<?php
namespace App\Http\Controllers\Api\V1;

use App\Models\Settings;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Requests\Settings\{
    Search as SearchSettings,
    Store as StoreSettings,
    Update as UpdateSettings,
};

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
     * @param SearchSettings $request
     *
     * @return ResourceCollection
     */
    public function index(SearchSettings $request): ResourceCollection
    {
        return $this->doList($request);
    }

    /**
     * Create new model and save in DB.
     * @param StoreSettings $request
     * @return JsonResponse|null
     */
    public function store(StoreSettings $request): ?JsonResponse
    {
        return $this->doStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Settings $model
     *
     * @return JsonResponse
     */
    public function show(Settings $model): JsonResponse
    {
        return $this->doShow($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Settings       $model
     * @param UpdateSettings $request
     *
     * @return JsonResponse
     */
    public function update(Settings $model, UpdateSettings $request): JsonResponse
    {
        return $this->doUpdate($model, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Settings $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Settings $model): JsonResponse
    {
        return $this->doDestroy($model);
    }
}
