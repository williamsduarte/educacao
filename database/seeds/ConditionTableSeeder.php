<?php

use Illuminate\Database\Seeder;
use App\Models\system\rh\Condition;
class ConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::create([
            'description' => 'Ativo',
        ]);
        Condition::create([
            'description' => 'Inativo',
        ]);
    }
}
