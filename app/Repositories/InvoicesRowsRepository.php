<?php

namespace App\Repositories;

use App\Models\InvoicesRows,
    App\Contracts\Validated,
    App\Contracts\InvoicesRowsRepositoryInterface;

class InvoicesRowsRepository implements InvoicesRowsRepositoryInterface, Validated
{
    /**
     * @inheritdoc
     */
    public function getRules(): array
    {
        return InvoicesRows::getRules();
    }

    /**
     * @inheritdoc
     */
    public function query()
    {
        return InvoicesRows::query();
    }

    /**
     * @inheritdoc
     */
    public function selectAll()
    {
        return InvoicesRows::all();
    }

    /**
     * @inheritdoc
     */
    public function get(array $conditions = array(), array $orderBy = array())
    {
        $query = InvoicesRows::where($conditions);
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
        return InvoicesRows::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        (new InvoicesRows)->fill($data)->save();
    }
}
