<?php
namespace App\Repositories;

use App\Models\ArticleSubcats;

class ArticleSubcatsRepository implements ArticleSubcatsRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function query()
    {
        return ArticleSubcats::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return ArticleSubcats::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = ArticleSubcats::where($conditions);
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
        return ArticleSubcats::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $fields = (new ArticleSubcats)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $data[$field];
        }
        (new ArticleSubcats($fieldVals))->save();
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();
        return $conditions;
    }
}
