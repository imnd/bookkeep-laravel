<?php
namespace App\Repositories;

use App\Models\ArticleCats,
    App\Contracts\ArticleCatsRepositoryInterface;

class ArticleCatsRepository implements ArticleCatsRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getRules()
    {
        return ArticleCats::getRules();
    }

    /**
     * @inheritdoc
     */
    public function query()
    {
        return ArticleCats::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return ArticleCats::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = ArticleCats::where($conditions);
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
        return ArticleCats::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        (new ArticleCats)->fill($data)->save();
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
