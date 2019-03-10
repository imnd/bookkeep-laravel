<?php

namespace App\Repositories;

use App\Models\Settings;

class SettingsRepository implements SettingsRepositoryInterface
{
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
    public function find($id)
    {
        return Settings::find($id);
    }

    /**
     * @inheritdoc
     */
    public function create(array $data)
    {
        $fields = (new Settings)->getFillable();
        $fieldVals = array();
        foreach ($fields as $field) {
            $fieldVals[$field] = $data[$field];
        }
        (new Settings($fieldVals))->save();
    }
}
