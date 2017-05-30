<?php

use Illuminate\Database\Seeder;
use App\Models\system\folks\Civil;
class CivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Civil::create([
            'state' => 'Solteiro'
        ]);
        Civil::create([
            'state' => 'Casado'
        ]);
        Civil::create([
            'state' => 'Separado'
        ]);
        Civil::create([
            'state' => 'Divorciado'
        ]);
        Civil::create([
            'state' => 'Viúvo'
        ]);
    }
}
