<?php
    namespace App\Repositories\Contract;

interface SerieRepositoryInterface
{
    public function creating($serie_id, array $discipline_id, $data);
    public function Discipline();
}