<?php
namespace App\Contracts;

interface HasRows
{
    /**
     * Связь один ко многим. Строки
     * 
     * @return array
     */
    public function rows();
}
