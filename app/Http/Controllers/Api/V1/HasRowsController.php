<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
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
    public function store(Request $request)
    {
        if (!request()->wantsJson()) {
            return response()->json(['success' => false], 400);
        }
        $rules = $this->repo->getRules();
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        $data = $request->validate($rules);
        $model = $this->repo->create($data);
        foreach ($data['rows'] as $row) {
            $model->rows()->create($row);
        }
        return response()->json(['success' => true], 201);
    }

    /**
     * Shows model edit form.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        try {
            $model = $this->_findModel($id);
        } catch (\HttpException $e) {
        }
        return response()->json([
            'item' => $model,
            'rows' => $model->rows()->get()->all()
        ]);
    }

    public function update($id, Request $request)
    {
        if (!request()->wantsJson()) {
            return response()->json(['success' => false], 400);
        }
        $rules = $this->repo->getRules();
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        $data = $request->validate($rules);
        // главная модель
        try {
            $model = $this->_findModel($id);
        } catch (\HttpException $e) {
        }
        $model->update($data);
        // позиции модели
        // чистим
        $model->rows()->delete();
        // пересоздаем новые
        foreach ($data['rows'] as $row) {
            $model->rows()->create($row);
        }
        return response()->json(['success' => true]);
    }
}
