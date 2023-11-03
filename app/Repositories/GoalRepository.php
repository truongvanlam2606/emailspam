<?php
namespace App\Repositories;

use App\Models\Goal;
use Carbon\Carbon;

class GoalRepository extends AbstractRepository
{
    public function makeModel()
    {
        return Goal::class;
    }

    public function getMyHeartTodayByUserId($userId)
    {
        return $this->model
            ->join('my_goals', 'goals.id', '=', 'my_goals.goal_id')
            ->where('my_goals.user_id', $userId)
            ->whereDate('my_goals.add_date', Carbon::now()->toDateString())
            ->select('goals.*')
            ->addSelect(['my_goals.add_date'])
            ->get();
    }

    public function myGoalWithDate($userId, $data)
    {
        return $this->model
            ->join('my_goals', 'goals.id', '=', 'my_goals.goal_id')
            ->where('my_goals.user_id', $userId)
            ->whereDate('my_goals.add_date', $data['date'])
            ->select('goals.*')
            ->addSelect(['my_goals.add_date'])
            ->get();
    }
}