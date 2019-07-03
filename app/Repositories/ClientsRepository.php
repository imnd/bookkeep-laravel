<?php

namespace App\Repositories;

use App\Models\Clients,
    App\Contracts\Validated,
    App\Contracts\QueryConditions,
    App\Contracts\ClientsRepositoryInterface;

class ClientsRepository implements ClientsRepositoryInterface, QueryConditions, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return Clients::getRules();
    }

    /**
     * @inheritdoc
     */
    public function query()
    {
        return Clients::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Clients::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Clients::where($conditions);
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
        return Clients::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        (new Clients)->fill($data)->save();
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        foreach (['name', 'address'] as $field) {
            if (!empty($params[$field])) {
                $conditions[] = array($field, 'LIKE', '%' . addslashes($params[$field]). '%');
            }
        }
        return $conditions;
    }
}
