<?php
    namespace App\Repositories;

    use App\Models\system\address\Address;
    use App\Models\system\folks\Civil;
    use App\Models\system\folks\Genre;
    use App\Models\system\folks\PhysicalPerson;
    use App\Repositories\Contract\PhysicalPersonRepositoryInterface;

    class PhysicalPersonRepositoryEloquent extends AbstractRepositoryEloquent implements PhysicalPersonRepositoryInterface
    {
        public function __construct(PhysicalPerson $model)
        {
            $this->model = $model;
        }

        public function civil()
        {
            return Civil::all();
        }
        public function genre()
        {
            return Genre::all();
        }
        public function autocomplete($term)
        {
            return Address::where('zipcode', 'LIKE', '%'.$term.'%')->take(10)->get();
        }


    }