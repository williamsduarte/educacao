<?php
    namespace App\Repositories;

use App\Models\system\educational\Discipline;
use App\Models\system\educational\Serie;
use App\Repositories\Contract\SerieRepositoryInterface;

class SerieRepositoryEloquent extends AbstractRepositoryEloquent implements SerieRepositoryInterface
{
    function __construct(Serie $model)
    {
        $this->model = $model;
    }

    public function creating($serie_id, array $discipline_id, $data)
    {
        $serie = Serie::find($serie_id);
        $serie->Discipline()->attach($discipline_id);
        return $this->model->create($data);
    }

    public function Discipline()
    {
        return Discipline::all();
    }
}