<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\ArticleSubcatsRepositoryInterface;

/**
 * Контроллер подкатегорий товаров
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */
class ArticleSubcatsController extends ApiController
{
    /**
     * Создание нового экземпляра контроллера.
     *
     * @param ArticleSubcatsRepositoryInterface $repo
     * @return void
     */
    public function __construct(ArticleSubcatsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
