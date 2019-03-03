<?php

namespace App\Repositories;

use App\Models\Regions,
    App\Contracts\QueryConditions;

class RegionsRepository implements RegionsRepositoryInterface, QueryConditions
{
    /**
     * @inheritdoc
     */
    public function query()
    {
        return Regions::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Regions::all();
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return Regions::find($id);
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['name'])) {
            $conditions[] = array('name', 'like', '%' . addslashes($params['name']). '%');
        }
        return $conditions;
    }
}
