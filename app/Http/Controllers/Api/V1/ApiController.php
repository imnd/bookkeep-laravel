<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
    Illuminate\Http\Resources\Json\ResourceCollection,
    Validator,
    App\Http\Controllers\Controller
;

/**
 * CRUD контроллер
 *
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ApiController extends Controller
{
    /**
     * Repository instance
     */
    protected $repo;

    /**
     * All of the models from the database by query conditions
     */
    public function list(Request $request)
    {
        $conditions = $this->repo->getSearchConditions($request->all());
        return new ResourceCollection($this->repo->get($conditions, [$request->get('field'), $request->get('order')]));
    }

    /**
     * Create new model and save in DB.
     */
    public function store(Request $request)
    {
        if (!request()->wantsJson()) {
            return null;
        }
        $rules = $this->repo->getRules();
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }
        $data = $request->validate($rules);
        $this->repo->create($data);
        return response()->json([
            'success' => true,
        ], 201);
    }

    /**
     * Shows model edit form.
     */
    public function edit($id)
    {
        return response()->json($this->_findModel($id));
    }

    /**
     * Updates model in DB.
     */
    public function update($id, Request $request)
    {
        $model = $this->_findModel($id);
        $data = $request->validate($model->getRules());
        $model->update($data);
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Deletes model from DB.
     */
    public function delete($id)
    {
        $this->_findModel($id)->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * @param integer $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function _findModel($id)
    {
        if (!$model = $this->repo->find($id)) {
            throw new HttpException('Нет такой модели.');
        }
        return $model;
    }
}
