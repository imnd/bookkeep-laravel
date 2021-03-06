<?php
namespace App\Http\Controllers\Api\V1;

use
    ReflectionClass,
    Illuminate\Http\Request,
    Illuminate\Http\Response,
    Illuminate\Http\Resources\Json\ResourceCollection,
    Illuminate\Database\Eloquent\Model,
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
     * Controller model class name
     * @var string
     */
    protected $modelName;
    /**
     * Controller resource class name
     * @var string
     */
    protected $resourceClassName;

    public function __construct()
    {
        $reflection = new ReflectionClass(get_called_class());
        $className = $reflection->getShortName();
        $entityName = str_replace('Controller', '', $className);
        if (is_null($this->modelName)) {
            $this->modelName = "App\\Models\\$entityName";
        }
        if (is_null($this->resourceClassName)) {
            $this->resourceClassName = "App\\Http\\Resources\\{$entityName}Resource";
        }
    }

    /**
     * All of the models from the database by query conditions
     * @param Request $request
     * @return ResourceCollection
     */
    protected function doList(Request $request)
    {
        $modelName = $this->modelName;
        $conditions = $modelName::getSearchConditions($request->all());
        $query = $modelName::where($conditions);
        if (!empty($field = $request->get('field')) && !empty($order = $request->get('order'))) {
            $query = $query->orderBy($field, $order);
        }
        return new ResourceCollection($query->get());
    }

    /**
     * Create new model and save in DB.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|null
     */
    protected function doStore(Request $request)
    {
        $modelName = $this->modelName;
        $modelName::create($request->validated());
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Model $model
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function doShow(Model $model)
    {
        return ($this->resourceClassName)::make($model);
    }

    /**
     * Updates model in DB.
     *
     * @param Model $model
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function doUpdate(Model $model, Request $request)
    {
        $model
            ->fill($request->validated())
            ->save();

        return response()->json([
            'resource' => ($this->resourceClassName)::make($model)
        ], Response::HTTP_NO_CONTENT);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model $model
     *
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    protected function doDestroy(Model $model)
    {
        return response()->json([
            'success' => $model->delete(),
        ], Response::HTTP_NO_CONTENT);
    }
}
