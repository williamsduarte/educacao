<?php

use Illuminate\Database\Seeder;
use App\Models\system\educational\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'type' => 'Tradicional',
        ]);
        Type::create([
            'type' => 'Construtivista',
        ]);
        Type::create([
            'type' => 'Montessoriano',
        ]);
        Type::create([
            'type' => 'Waldorf',
        ]);
        Type::create([
            'type' => 'Freinet',
        ]);

    }
}
