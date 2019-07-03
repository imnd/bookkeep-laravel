<?php
namespace App\Repositories;

use App\Models\ArticleSubcats,
    App\Contracts\ArticleSubcatsRepositoryInterface;

class ArticleSubcatsRepository implements ArticleSubcatsRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function getRules()
    {
        return ArticleSubcats::getRules();
    }

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
        (new ArticleSubcats)->fill($data)->save();
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
