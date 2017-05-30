<?php

use Illuminate\Database\Seeder;
use App\Models\system\folks\PhysicalPerson;
class PhysicalPersonTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhysicalPerson::create([
            'name'            => 'Mattheus Gomes Muller',
            'cpf'             => '046.232.861-93',
            'rg'              => '2334625-6',
            'dispatcher'      => 'SSP/MT',
            'birth'           => '1994-12-26',
            'genre_id'        => '1',
            'civil_id'        => '1',
            'phone'           => '(65) 99981-6293',
            'cell_phone'      => '(65) 99981-6293',
            'father'          => 'Telmo Jacob Muller',
            'mother'          => 'Suely Gomes Mateus',
            'address_id'      => '1',
            'district'        => 'Novo Diamantino',
            'public_place'    => 'Rua Camboatã nº 175',
        ]);

    }
}
