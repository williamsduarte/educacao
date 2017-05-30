<?php

namespace App\Repositories;

use App\Models\system\institutional\Prefecture;
use App\Repositories\Contract\PrefectureRepositoryInterface;

class PrefectureRepositoryEloquent extends AbstractRepositoryEloquent implements PrefectureRepositoryInterface
{
    public function __construct(Prefecture $model)
    {
        $this->model = $model;
    }

    public function autocomplete($term)
    {
        return Address::where('zipcode', 'LIKE', '%'.$term.'%')->take(10)->get();
    }


}