<?php

    namespace App\Repositories;

    use App\Models\system\folks\PhysicalPerson;
    use App\Models\system\institutional\Sector;
    use App\Models\system\rh\Condition;
    use App\Models\system\rh\Employee;
    use App\Models\system\rh\Link;
    use App\Repositories\Contract\EmployeeRepositoryInterface;

    class EmployeeRepositoryEloquent extends AbstractRepositoryEloquent implements EmployeeRepositoryInterface
    {
        function __construct(Employee $model)
        {
            $this->model = $model;
        }
        public function autocomplete($term)
        {
            return PhysicalPerson::where('name', 'LIKE', '%'.$term.'%')->take(10)->get();
        }

        public function sector()
        {
            return Sector::all();
        }

        public function link()
        {
            return Link::all();
        }

        public function condition()
        {
            return Condition::all();
        }
    }