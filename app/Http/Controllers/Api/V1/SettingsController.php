<?php
namespace App\Http\Controllers\Api\V1;

use App\Contracts\SettingsRepositoryInterface;

/**
 * Контроллер районов города
 * 
 * @author Андрей Сердюк
 * @copyright (c) 2019 IMND
 */ 
class SettingsController extends ApiController
{
    /**
     * @param SettingsRepositoryInterface $repo
     * @return void
     */
    public function __construct(SettingsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
}
