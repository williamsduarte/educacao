<?php
    namespace App\Repositories;

use App\Models\system\educational\Discipline;
use App\Models\system\educational\Knowleadge;
use App\Repositories\Contract\DisciplineRepositoryInterface;

class DisciplineRepositoryEloquent extends AbstractRepositoryEloquent implements DisciplineRepositoryInterface
{
    function __construct(Discipline $model)
    {
        $this->model = $model;
    }

    public function Knowleadge()
    {
        return Knowleadge::all();
    }
}