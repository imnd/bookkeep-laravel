<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\ArticleCatsRepositoryInterface;

/**
 * Контроллер подкатегорий товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ArticleCatsController extends ApiController
{
    /**
     * @param ArticleCatsRepositoryInterface $repo
     * @return void
     */
    public function __construct(ArticleCatsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
