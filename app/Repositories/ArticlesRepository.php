<?php

namespace App\Repositories;

use App\Models\Articles,
    App\Contracts\QueryConditions;

class ArticlesRepository implements ArticlesRepositoryInterface, QueryConditions
{
    /**
     * @inheritdoc
     */
    public function query()
    {
        return Articles::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Articles::all();
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return Articles::find($id);
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        if (!empty($params['priceFrom'])) {
            $conditions[] = array('price', '>=', addslashes($params['priceFrom']));
        }
        if (!empty($params['priceTo'])) {
            $conditions[] = array('price', '<=', addslashes($params['priceTo']));
        }
        if (!empty($params['name'])) {
            $conditions[] = array('name', 'LIKE', '%' . addslashes($params['name']). '%');
        }
        foreach (['subcat_id', 'unit', 'active'] as $field) {
            if (isset($params[$field]) && $params[$field]!=='') {
                $conditions[] = array($field, '=', addslashes($params[$field]));
            }
        }
        return $conditions;
    }
}
