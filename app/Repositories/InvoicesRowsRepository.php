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

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $fields = (new InvoicesRows)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $data[$field];
        }
        (new InvoicesRows($fieldVals))->save();
    }
}
