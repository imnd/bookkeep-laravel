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
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Regions::where($conditions);
        if (!empty($orderBy[0]) && !empty($orderBy[1])) {
            $query = $query->orderBy($orderBy[0], $orderBy[1]);
        }
        return $query->get();
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
    public function create(array $data)
    {
        $fields = (new Regions)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $data[$field];
        }
        (new Regions($fieldVals))->save();
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
