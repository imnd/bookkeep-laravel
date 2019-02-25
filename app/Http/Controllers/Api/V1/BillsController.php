<?php
namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class BillsController extends ApiController
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'App\Models\Bills';
    /**
     * @inheritdoc
     */
    protected $collectionName = 'App\Http\Resources\BillCollection';
}
