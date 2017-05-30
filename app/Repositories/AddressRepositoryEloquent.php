<?php

Namespace App\Repositories;

use App\Models\system\address\Address;
use App\Repositories\Contract\AddressRepositoryInterface;

class AddressRepositoryEloquent extends AbstractRepositoryEloquent implements AddressRepositoryInterface
{
    public function __construct(Address $model)
    {
        $this->model = $model;
    }

}