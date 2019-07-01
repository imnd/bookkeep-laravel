<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
    Illuminate\Http\Exception;

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
     */
    public function create(Request $request)
    {
        $rules = $this->repo->getRules();
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            $errors = $validation->errors();
            return $errors->toJson();
        }
        $data = $request->validate($rules);
        $model = $this->repo->create($data);
        foreach ($data['rows'] as $rowData) {
            $model->rows()->create($rowData);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Shows model edit form.
     */
    public function edit($id)
    {
        $model = $this->_findModel($id);
        return response()->json([
            'item' => $model,
            'rows' => $model->rows()->get()->all()
        ]);
    }

    public function update($id, Request $request)
    {
        // главная модель
        $rules = $this->repo->getRules();
        $data = $request->validate($rules);
        $model = $this->_findModel($id);
        $model->update($data['model']);
        // позиции модели
        // чистим
        $model->rows()->delete();
        // пересоздаем новые
        foreach ($data['rows'] as $rowData) {
            $model->rows()->create($rowData);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
