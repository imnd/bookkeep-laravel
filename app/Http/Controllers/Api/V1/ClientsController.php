<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\ClientsRepositoryInterface;

/**
 * Контроллер клиентов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ClientsController extends ApiController
{
    /**
     * @param ClientsRepositoryInterface $repo
     * @return void
     */
    public function __construct(ClientsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
