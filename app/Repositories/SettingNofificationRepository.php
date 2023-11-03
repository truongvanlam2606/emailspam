<?php
namespace App\Repositories;

use App\Models\SettingNotification;

class SettingNofificationRepository extends AbstractRepository
{
    public function makeModel()
    {
        return SettingNotification::class;
    }
}