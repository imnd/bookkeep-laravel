<?php

namespace App\Repositories;

use App\Models\Bills,
    App\Contracts\BillsRepositoryInterface,
    App\Contracts\QueryConditions;

class BillsRepository implements BillsRepositoryInterface, QueryConditions
{
    /**
     * @inheritdoc
     */
    public function query()
    {
        return Bills::query();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Bills::where($conditions);
        if (!empty($orderBy[0]) && !empty($orderBy[1])) {
            $query = $query->orderBy($orderBy[0], $orderBy[1]);
        }
        return $query->get();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Bills::all();
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return Bills::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $fields = (new Bills)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $data[$field];
        }
        (new Bills($fieldVals))->save();
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
        foreach (['contract_num', 'client_id'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
