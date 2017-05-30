<?php
namespace App\Repositories;



use App\Models\system\institutional\Secretary;
use App\Models\system\institutional\Sector;
use App\Repositories\Contract\SectorRepositoryInterface;

class SectorRepositoryEloquent extends AbstractRepositoryEloquent implements SectorRepositoryInterface
{
    public function __construct(Sector $model)
    {
        $this->model = $model;
    }

    public function autocomplete($term)
    {
        return Secretary::where('name', 'LIKE', '%'.$term.'%')->take(10)->get();
    }

}