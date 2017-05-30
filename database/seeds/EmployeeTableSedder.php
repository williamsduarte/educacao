<?php

use Illuminate\Database\Seeder;
use App\Models\system\rh\Employee;
class EmployeeTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'physical_person_id'    => '1',
            'sector_id'             => '1',
            'condition_id'          => '1',
            'link_id'               => '2'
        ]);

    }
}
