<?php
namespace App\Repositories;

use App\Models\MyNow;
use App\Models\User;

class MyNowRepository extends AbstractRepository
{
    public function makeModel()
    {
        return MyNow::class;
    }
}