<?php

namespace App\Repositories;

use App\Models\Purchases,
    App\Contracts\QueryConditions,
    App\Contracts\PurchasesRepositoryInterface;

class PurchasesRepository implements PurchasesRepositoryInterface, QueryConditions
{
    /**
     * @inheritdoc
     */
    public function query()
    {
        return Purchases::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Purchases::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Purchases::where($conditions);
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
        return Purchases::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $fields = (new Purchases)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $data[$field];
        }
        (new Purchases($fieldVals))->save();
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
        if (isset($params['number']) && $params['number']!=='') {
            $conditions[] = array('number', '=', addslashes($params['number']));
        }

        return $conditions;
    }
}
