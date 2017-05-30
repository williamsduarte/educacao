<?php
    namespace App\Repositories;

use App\Models\system\educational\Localization;
use App\Models\system\educational\Network;
use App\Models\system\educational\School;
use App\Models\system\folks\LegalPerson;
use App\Repositories\Contract\SchoolRespositoryInterface;

class SchoolRepositoryEloquent extends AbstractRepositoryEloquent implements SchoolRespositoryInterface
{
    function __construct(School $model)
    {
        $this->model = $model;
    }
    public function autocomplete($term)
    {
        return LegalPerson::where('company_name', 'LIKE', '%'.$term.'%')->take(10)->get();
    }

    public function Localization()
    {
        return Localization::all();
    }

    public function Network()
    {
        return Network::all();
    }

}