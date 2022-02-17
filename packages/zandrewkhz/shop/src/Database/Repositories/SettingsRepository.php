<?php


namespace Andrewkharzin\Database\Repositories;

use Andrewkharzin\Database\Models\Settings;

class SettingsRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Settings::class;
    }
}
