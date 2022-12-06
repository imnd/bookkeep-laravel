<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse,
    Illuminate\Http\Request,
    Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Контроллер табличных моделей (фактур и т.д.)
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class HasRowsController extends ApiController
{
    /**
     * Create new model and save in DB.
     *
     * @param Request $request
     * @return JsonResponse
     */
    protected function doStore(Request $request): JsonResponse
    {
        $modelName = $this->modelName;
        $model = $modelName::create(
            $request->validated()
        );
        foreach ($request->rows as $row) {
            $model->rows()->create($row);
        }
        return response()->json(['success' => true], 201);
    }

    /**
     * Return rows of the specified resource.
     *
     * @param Model $model
     * @return JsonResponse
     */
    public function doGetRows(Model $model): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => new ResourceCollection($model->rows)
        ]);
    }

    /**
     * Update model in DB.
     *
     * @param Model $model
     * @param Request $request
     *
     * @return JsonResponse
     */
    protected function makeUpdate(Model $model, Request $request): JsonResponse
    {
        $model
            ->fill($request->validated())
            ->save();

        // model rows
        // clean
        $model->rows()->delete();
        // create new
        foreach ($request->rows as $row) {
            $model->rows()->create($row);
        }
        $resourceClassName = $this->resourceClassName;
        return $resourceClassName::make($model);
    }
}
