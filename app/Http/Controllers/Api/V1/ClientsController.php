<?php
namespace App\Http\Controllers\Api\V1;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ClientsController extends ApiController
{
    /**
     * @inheritdoc
     */
    protected $modelName = 'App\Models\Clients';
    /**
     * @inheritdoc
     */
    protected $collectionName = 'App\Http\Resources\ClientCollection';
}
