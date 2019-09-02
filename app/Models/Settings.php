<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model,
    App\Contracts\QueryConditions;

class Settings extends Model implements QueryConditions
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'key',
        'value',
   	];

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        return $conditions;
    }
}
