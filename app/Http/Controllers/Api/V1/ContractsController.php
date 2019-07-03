<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\ContractsRepositoryInterface;

/**
 * Контроллер контрактов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ContractsController extends HasRowsController
{
    /**
     * @param ContractsRepositoryInterface $repo
     * @return void
     */
    public function __construct(ContractsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
