<?php

namespace App\Repositories;

use App\Models\Purchases,
    App\Contracts\QueryConditions;

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
    public function find($id)
    {
        return Purchases::find($id);
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
