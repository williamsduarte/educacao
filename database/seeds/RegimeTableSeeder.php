<?php

use Illuminate\Database\Seeder;
use App\Models\system\educational\Regime;
class RegimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regime::create([
            'regime' => 'semestral',
        ]);
        Regime::create([
            'regime' => 'seriado',
        ]);
    }
}
