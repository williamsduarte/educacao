<?php

namespace App\Repositories;

use App\Http\Controllers\system\address\Address;

use App\Models\system\folks\LegalPerson;
use App\Repositories\Contract\LegalPersonRepositoryInterface;

class LegalPersonRepositoryEloquent extends AbstractRepositoryEloquent implements LegalPersonRepositoryInterface
{
    public function __construct(LegalPerson $model)
    {
        $this->model = $model;
    }

    public function autocomplete($term)
    {
        return Address::where('zipcode', 'LIKE', '%'.$term.'%')->take(10)->get();
    }
}