<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var string $modelName
     */
    protected $modelName;

    /**
     * @return string
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * Валидируем поля формы
     * 
     * @param Illuminate\Http\Request $request
     * @return Validator
     */
    protected function validate(Request $request)
    {
        $modelName = $this->modelName;
        return Validator::make($request->all(), $modelName::getRules());
    }
}
