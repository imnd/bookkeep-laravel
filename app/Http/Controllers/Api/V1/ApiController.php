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
     * Экземпляр репозитория.
     */
    protected $repo;

    public function list(Request $request)
    {
        $conditions = $this->repo->getSearchConditions($request->all());
        return new ResourceCollection($this->repo->query()->where($conditions)->get());
    }

    public function create(Request $request)
    {
        $modelName = $this->modelName;
        $fields = (new $modelName)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $request->get($field);
        }
        (new $modelName($fieldVals))->save();

        return response()->json('success');
    }

    public function edit($id)
    {
        return response()->json($this->repo->find($id));
    }

    public function update($id, Request $request)
    {
        $this->repo->find($id)->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $this->repo->find($id)->delete();

        return response()->json('successfully deleted');
    }
}
