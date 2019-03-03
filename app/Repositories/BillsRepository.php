<?php

namespace App\Repositories;

use App\Models\Bills,
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
