<?php

namespace App\Repositories;

use App\Models\Settings,
    App\Contracts\Validated,
    App\Contracts\QueryConditions,
    App\Contracts\SettingsRepositoryInterface;

class SettingsRepository implements SettingsRepositoryInterface, QueryConditions, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return Settings::getRules();
    }

    /**
     * @inheritdoc
     */
    public function query()
    {
        return Settings::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Settings::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Settings::where($conditions);
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
        return Settings::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        (new Settings)->fill($data)->save();
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
