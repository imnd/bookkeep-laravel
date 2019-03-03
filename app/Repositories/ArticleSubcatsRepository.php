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
    public function find($id)
    {
        return ArticleSubcats::find($id);
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
