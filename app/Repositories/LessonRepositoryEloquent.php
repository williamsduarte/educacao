<?php
   namespace App\Repositories;


use App\Models\system\educational\Lesson;
use App\Models\system\educational\School;
use App\Repositories\Contract\LessonRepositoryInterface;

class LessonRepositoryEloquent extends AbstractRepositoryEloquent implements LessonRepositoryInterface
{
    function __construct(Lesson $model)
    {
        $this->model = $model;
    }

    public function autocomplete($term)
    {
        return School::where('legal_person_id', 'LIKE', '%'.$term.'%')->take(10)->get();
    }

}