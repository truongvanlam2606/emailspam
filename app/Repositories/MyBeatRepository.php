<?php
namespace App\Repositories;

use App\Models\MyBeat;
use App\Models\MyNow;
use App\Models\User;

class MyBeatRepository extends AbstractRepository
{
    public function makeModel()
    {
        return MyBeat::class;
    }

    public function getMyBeatByUserId($userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->first();
    }
}