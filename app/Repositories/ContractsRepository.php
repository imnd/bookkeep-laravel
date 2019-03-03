<?php

namespace App\Repositories;

use App\Models\Contracts,
    App\Contracts\QueryConditions;

class ContractsRepository implements ContractsRepositoryInterface, QueryConditions
{
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
    public function find($id)
    {
        return Contracts::find($id);
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
