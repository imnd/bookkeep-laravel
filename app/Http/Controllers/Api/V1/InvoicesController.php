<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\InvoicesRepositoryInterface;

/**
 * Контроллер фактур
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class InvoicesController extends HasRowsController
{
    /**
     * @param InvoicesRepositoryInterface $repo
     * @return void
     */
    public function __construct(InvoicesRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
