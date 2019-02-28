<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Controllers\Controller;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ApiController extends Controller
{
    /**
     * Имя класса модели
     */
    protected $modelName;

    public function list(Request $request)
    {
        $modelName = $this->modelName;
        /**
         * @var \Illuminate\Database\Eloquent\Builder $query
         */
        $query = $modelName::query();
        $conditions = $modelName::getQueryConditions($request->all());
        return new ResourceCollection($query->where($conditions)->get());
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
        $modelName = $this->modelName;
        return response()->json($modelName::find($id));
    }

    public function update($id, Request $request)
    {
        $modelName = $this->modelName;
        $modelName::find($id)->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $modelName = $this->modelName;
        $modelName::find($id)->delete();

        return response()->json('successfully deleted');
    }
}
