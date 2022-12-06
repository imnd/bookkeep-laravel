<?php
namespace App\Http\Controllers\Api\V1;

use
    Exception,
    Illuminate\Http\JsonResponse,
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
    protected string $modelName = '';
    /**
     * Controller resource class name
     * @var string
     */
    protected string $resourceClassName = '';

    public function __construct()
    {
        $reflection = new ReflectionClass(get_called_class());
        $className = $reflection->getShortName();
        $entityName = str_replace('Controller', '', $className);
        if (empty($this->modelName)) {
            $this->modelName = "App\\Models\\$entityName";
        }
        if (empty($this->resourceClassName)) {
            $this->resourceClassName = "App\\Http\\Resources\\{$entityName}Resource";
        }
    }

    /**
     * All of the models from the database by query conditions
     * @param Request $request
     * @return ResourceCollection
     */
    protected function doList(Request $request): ResourceCollection
    {
        $conditions = ($this->modelName)::getSearchConditions($request->all());
        $query = ($this->modelName)::where($conditions);
        if (!empty($field = $request->get('field')) && !empty($order = $request->get('order'))) {
            $query = $query->orderBy($field, $order);
        }
        return new ResourceCollection($query->get());
    }

    /**
     * Create new model and save in DB.
     * @param Request $request
     * @return JsonResponse|null
     */
    protected function doStore(Request $request): ?JsonResponse
    {
        ($this->modelName)::create($request->validated());
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Model $model
     *
     * @return JsonResponse
     */
    protected function doShow(Model $model): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => ($this->resourceClassName)::make($model)
        ]);
    }

    /**
     * Updates model in DB.
     *
     * @param Model $model
     * @param Request $request
     *
     * @return JsonResponse
     */
    protected function doUpdate(Model $model, Request $request): JsonResponse
    {
        $model->update($request->validated());

        return response()->json([
            'success'  => true,
            'resource' => ($this->resourceClassName)::make($model)
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Model $model
     *
     * @return JsonResponse
     * @throws Exception
     */
    protected function doDestroy(Model $model): JsonResponse
    {
        return response()->json([
            'success' => $model->delete(),
        ], Response::HTTP_OK);
    }
}
