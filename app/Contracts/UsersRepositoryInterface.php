<?php
namespace App\Contracts;

interface UsersRepositoryInterface extends RepositoryInterface
{
    /**
     * Get current authenticated user model
     * 
     * @return User
     */
    public function findCurrent();
}
