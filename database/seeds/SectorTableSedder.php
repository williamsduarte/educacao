<?php

use Illuminate\Database\Seeder;
use App\Models\system\institutional\Sector;
class SectorTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::create([
            'secretary_id'       => '1',
            'sector'             => 'Administrativo',
            'branch'             => '000',
        ]);
    }
}
