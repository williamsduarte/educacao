<?php

use Illuminate\Database\Seeder;
use App\Models\system\institutional\Prefecture;
class PrefectureTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prefecture::create([
            'name'             => 'Prefeitura Municipal de Diamantino',
            'manager'          => 'Eduardo Capistrano',
            'phone'            => '(65) 3336-6400',
            'address_id'       => '1',
            'district'         => 'Jardim Eldorado',
            'public_place'     => 'Avenida JPF Mendes nº 2500'
        ]);
    }
}
