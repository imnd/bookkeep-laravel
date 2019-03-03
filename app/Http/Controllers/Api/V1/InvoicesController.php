<?php
namespace App\Http\Controllers\Api\V1;

use App\Repositories\InvoicesRepositoryInterface;

/**
 * Контроллер фактур
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class InvoicesController extends HasRowsController
{
    /**
     * Создание нового экземпляра контроллера.
     *
     * @param InvoicesRepositoryInterface $repo
     * @return void
     */
    public function __construct(InvoicesRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
