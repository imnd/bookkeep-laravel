<?php
namespace App\Repositories;

interface RepositoryInterface
{
    public function selectAll();

    public function find($id);

    public function query();
}
