<?php

namespace App\Repositories;

use App\Models\InvoicesRows;

class InvoicesRowsRepository implements InvoicesRowsRepositoryInterface
{
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
    public function find($id)
    {
        return InvoicesRows::find($id);
    }
}
