<?php
namespace App\Contracts;

interface QueryConditions
{
    /**
     * @param array $params
     * @return array
     */
    public static function getSearchConditions(array $params): array;
}
