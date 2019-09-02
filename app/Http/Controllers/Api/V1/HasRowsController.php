<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
    Illuminate\Database\Eloquent\Model,
    Validator;

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function makeStore(Request $request)
    {
        $modelName = $this->modelName;
        $model = $modelName::create(
            $request->validated()
        );
        foreach ($data['rows'] as $row) {
            $model->rows()->create($row);
        }
        return response()->json(['success' => true], 201);
    }

    /**
     * Shows model edit form.
     * 
     * @param Model $model
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    protected function makeShow(Model $model)
    {
        return response()->json([
            'item' => $model,
            'rows' => $model->rows()->get()->all()
        ]);
    }

    /**
     * Updates model in DB.
     * 
     * @param Model $model
     * @param Request $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    protected function makeUpdate(Model $model, Request $request)
    {
        $model
            ->fill($request->validated())
            ->save();

        // позиции модели
        // чистим
        $model->rows()->delete();
        // пересоздаем новые
        foreach ($data['rows'] as $row) {
            $model->rows()->create($row);
        }
        $resourceClassName = $this->resourceClassName;
        return $resourceClassName::make($model);
    }
}
