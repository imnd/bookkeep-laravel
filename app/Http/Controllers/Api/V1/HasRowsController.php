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
        $rules = $this->repo->create()->getRules();
        $this->validate($request, $rules);

        $validation = Validator::make($request->all(), $this->repo->create()->getRules());

        if ($validation->fails()) {
            $errors = $validation->errors();
            return $errors->toJson();
        }

        $data = $request->validate($this->repo->create()->getRules());
        $this->repo->create($data);
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
        $model = $this->_findModel($id);
        $postData = $request->post();
        $model->update($postData['model']);
        // позиции модели
        // чистим
        $model->rows()->delete();
        // пересоздаем новые
        foreach ($postData['rows'] as $rowData) {
            $model->rows()->create($rowData);
        }
        return response()->json('successfully updated.');
    }
}
