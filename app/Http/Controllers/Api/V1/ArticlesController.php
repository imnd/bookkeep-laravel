<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\ArticlesRepositoryInterface;

/**
 * Контроллер товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class ArticlesController extends ApiController
{
    /**
     * @param ArticlesRepositoryInterface $repo
     * @return void
     */
    public function __construct(ArticlesRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
