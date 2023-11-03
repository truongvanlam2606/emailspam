<?php
namespace App\Repositories;

use App\Models\Survey;

class SurveyRepository extends AbstractRepository
{
    public function makeModel()
    {
        return Survey::class;
    }
}