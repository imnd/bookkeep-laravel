<?php

namespace App\Repositories;

use App\Models\Purchases,
    App\Contracts\Validated,
    App\Contracts\QueryConditions,
    App\Contracts\PurchasesRepositoryInterface;

class PurchasesRepository implements PurchasesRepositoryInterface, QueryConditions, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return Purchases::getRules();
    }

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
        $model = new Purchases;
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
        if (isset($params['number']) && $params['number']!=='') {
            $conditions[] = array('number', '=', addslashes($params['number']));
        }

        return $conditions;
    }
}
