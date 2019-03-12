<?php
namespace App\Repositories;

interface UsersRepositoryInterface extends RepositoryInterface
{
    /**
     * Get current authenticated user model
     * 
     * @return User
     */
    public function findCurrent();
}
