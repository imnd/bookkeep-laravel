<?php
namespace App\Contracts;

interface UsersRepositoryInterface extends RepositoryInterface
{
    /**
     * Get current authenticated user model
     * 
     * @return \App\Models\Users
     */
    public function findCurrent();
}
