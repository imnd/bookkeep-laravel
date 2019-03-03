<?php
namespace App\Contracts;

interface QueryConditions
{
    /**
     * @return array
     */
    public function getSearchConditions(array $params): array;
}
