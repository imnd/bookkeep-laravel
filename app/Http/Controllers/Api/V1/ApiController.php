<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request,
    Illuminate\Http\Resources\Json\ResourceCollection,
    App\Http\Controllers\Controller;

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
    public function create(Request $request)
    {
        $this->repo->create($request->all());
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Shows model edit form.
     */
    public function edit($id)
    {
        return response()->json($this->repo->find($id));
    }

    /**
     * Updates model in DB.
     */
    public function update($id, Request $request)
    {
        $this->repo->find($id)->update($request->all());

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Deletes model from DB.
     */
    public function delete($id)
    {
        $this->repo->find($id)->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
