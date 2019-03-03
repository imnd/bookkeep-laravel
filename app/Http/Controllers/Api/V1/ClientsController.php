<?php
namespace App\Http\Controllers\Api\V1;

use App\Repositories\ClientsRepositoryInterface;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ClientsController extends ApiController
{
    /**
     * Создание нового экземпляра контроллера.
     *
     * @param ClientsRepositoryInterface $repo
     * @return void
     */
    public function __construct(ClientsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
