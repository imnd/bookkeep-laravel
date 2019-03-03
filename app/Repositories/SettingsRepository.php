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
}
