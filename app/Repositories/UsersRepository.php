<?php

namespace App\Repositories;

use App\Models\Users,
    Illuminate\Support\Facades\Auth,
    App\Contracts\Validated,
    App\Contracts\QueryConditions,
    App\Contracts\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface, QueryConditions, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return Users::getRules();
    }

    /**
     * @inheritdoc
     */
    public function query()
    {
        return Users::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return Users::all();
    }

    /**
     * @inheritdoc
     */
    public function find($id)
    {
        return Users::find($id);
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = Users::where($conditions);
        if (!empty($orderBy[0]) && !empty($orderBy[1])) {
            $query = $query->orderBy($orderBy[0], $orderBy[1]);
        }
        return $query->get();
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        (new Users)->fill($data)->save();
    }

    /**
     * @inheritdoc
     */
    public function findCurrent()
    {
        if ($id = Auth::id()) {
            return Users::find($id);
        }
    }

    /**
     * @inheritdoc
     */
    public function getSearchConditions(array $params): array
    {
        $conditions = array();

        if (!empty($params['name'])) {
            $conditions[] = array('name', 'LIKE', '%' . addslashes($params['name']). '%');
        }
        if (!empty($params['email'])) {
            $conditions[] = array('email', '=', addslashes($params['email']));
        }

        return $conditions;
    }
}
