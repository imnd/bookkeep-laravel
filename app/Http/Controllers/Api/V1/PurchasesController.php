<?php
namespace App\Http\Controllers\Api\V1;

use App\Repositories\PurchasesRepositoryInterface;

/**
 * Контроллер закупок
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class PurchasesController extends HasRowsController
{
    /**
     * Создание нового экземпляра контроллера.
     *
     * @param PurchasesRepositoryInterface $repo
     * @return void
     */
    public function __construct(PurchasesRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
