<?php
    namespace App\Repositories;

use App\Models\system\rh\Employee;
use App\Repositories\Contract\UserRepositoryInterface;
use App\User;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepositoryInterface
{
    function __construct(User $model)
    {
        $this->model = $model;
    }

    public function autocomplete($term)
    {
        return Employee::where('physical_person_id', 'LIKE', '%'.$term.'%')->take(10)->get();
    }

    public function criptografia($data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->model->create($data);
    }

    public function updatecripto($data, $id)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->model->update($data);
    }

    public function descriptografia($data)
    {
    }
}