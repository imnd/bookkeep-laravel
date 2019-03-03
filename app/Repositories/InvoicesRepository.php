<?php

namespace App\Repositories;

use App\Models\Invoices,
    App\Contracts\QueryConditions;

class InvoicesRepository implements InvoicesRepositoryInterface, QueryConditions
{
    /**
     * @inheritdoc
     */
    public function query()
    {
        return Invoices::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Invoices::all();
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return Invoices::find($id);
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
        foreach (['number', 'contract_num', 'client_id'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
