<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
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
    /**
     * Имя класса коллекции
     */
    protected $collectionName;

    public function list()
    {
        $collectionName = $this->collectionName;
        $modelName = $this->modelName;
        return new $collectionName($modelName::all());
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
