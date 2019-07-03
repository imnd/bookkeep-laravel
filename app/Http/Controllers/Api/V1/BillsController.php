<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\BillsRepositoryInterface;

/**
 * Контроллер счетов
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class BillsController extends ApiController
{
    /**
     * @param BillsRepositoryInterface $repo
     * @return void
     */
    public function __construct(BillsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
