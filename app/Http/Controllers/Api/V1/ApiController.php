<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
    Illuminate\Http\Resources\Json\ResourceCollection,
    App\Http\Controllers\Controller,
    HttpException,
    Validator
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
     * @var \App\Contracts\RepositoryInterface
     */
    protected $repo;

    /**
     * All of the models from the database by query conditions
     * @param Request $request
     * @return ResourceCollection
     */
    public function list(Request $request)
    {
        $conditions = $this->repo->getSearchConditions($request->all());
        return new ResourceCollection($this->repo->get($conditions, [$request->get('field'), $request->get('order')]));
    }

    /**
     * Create new model and save in DB.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|null
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
        $this->repo->create($data);
        return response()->json(['success' => true], 201);
    }

    /**
     * Shows model edit form.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json($this->_findModel($id));
    }

    /**
     * Updates model in DB.
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        if (!request()->wantsJson()) {
            return response()->json(['success' => false], 400);
        }
        $rules = $this->repo->getRules();
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            //print '<pre>'.print_r('bjcbiubui', true).'</pre>';die;
            return response()->json($validation->errors(), 400);
        }
        $data = $request->validate($rules);
        $model = $this->_findModel($id);
        $model->update($data);
        return response()->json(['success' => true]);
    }

    /**
     * Deletes model from DB.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
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
