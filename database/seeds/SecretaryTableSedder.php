<?php

use Illuminate\Database\Seeder;
use App\Models\system\institutional\Secretary;
class SecretaryTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secretary::create([
            'prefecture_id'              => '1',
            'name'                       => 'Secretaria Municipal de Diamantino',
            'manager'                    => 'Eduardo Capistrano',
            'district'                   => 'Centro',
            'public_place'               => 'Rua João Batista das Neves',
            'phone'                      => '(65) 3336-1010',
        ]);
    }
}
