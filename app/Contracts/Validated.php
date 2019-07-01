<?php
namespace App\Contracts;

interface Validated
{
    /**
     * Get model validation rules.
     *
     * @return array
     */
    public function getRules(): array;
}
