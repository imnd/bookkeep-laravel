<?php

namespace App\Models;

interface QueryConditions
{
    /**
     * Устанавливает условия поиска
     * 
     * @param array $params
     * @return array
     */
    public static function getQueryConditions(array $params): array;
}
