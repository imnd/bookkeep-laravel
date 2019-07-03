<?php

namespace App\Repositories;

use App\Models\Contracts,
    App\Contracts\Validated,
    App\Contracts\QueryConditions,
    App\Contracts\ContractsRepositoryInterface;

class ContractsRepository implements ContractsRepositoryInterface, QueryConditions, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return Contracts::getRules();
    }

    /**
     * @inheritdoc
     */
    public function query()
    {
        return Contracts::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Contracts::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Contracts::where($conditions);
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
        return Contracts::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $model = new Contracts;
        $model->fill($data)->save();
        return $model;
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['dateFrom'])) {
            $conditions[] = array('date', '>=', addslashes($params['dateFrom']));
        }
        if (!empty($params['dateTo'])) {
            $conditions[] = array('date', '<=', addslashes($params['dateTo']));
        }
        foreach (['number', 'client_id'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
