<?php
namespace App\Http\Controllers\Api\V1;

use
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Illuminate\Http\Resources\Json\ResourceCollection,
    Illuminate\Database\Eloquent\Model,
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
        try {
            return response()->json($this->_findModel($id));
        } catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 404);
        }
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
            return response()->json($validation->errors(), 400);
        }
        $data = $request->validate($rules);
        try {
            $model = $this->_findModel($id);
        } catch (HttpException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 404);
        }
        $model->update($data);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        if ($model->delete()) {
            return response('', Response::HTTP_OK)->json([
                'success' => true,
            ]);
        }
        return response('', Response::HTTP_NOT_FOUND)->json([
            'success' => false,
        ]);
    }
}
