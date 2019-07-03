<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\RegionsRepositoryInterface;

/**
 * Контроллер районов города
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class RegionsController extends ApiController
{
    /**
     * @param RegionsRepositoryInterface $repo
     * @return void
     */
    public function __construct(RegionsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
