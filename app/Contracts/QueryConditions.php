<?php
namespace App\Contracts;

interface QueryConditions
{
    /**
     * @param array $params
     * @return array
     */
    public function getSearchConditions(array $params): array;
}
