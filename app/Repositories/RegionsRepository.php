<?php

namespace App\Repositories;

use App\Models\Regions,
    App\Contracts\Validated,
    App\Contracts\QueryConditions,
    App\Contracts\RegionsRepositoryInterface;

class RegionsRepository implements RegionsRepositoryInterface, QueryConditions, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return Regions::getRules();
    }

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
        (new Regions)->fill($data)->save();
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
