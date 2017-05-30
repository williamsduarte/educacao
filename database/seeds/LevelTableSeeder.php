<?php

use Illuminate\Database\Seeder;
use App\Models\system\educational\Level;
class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'level' => 'Educação Infantil',
        ]);
        Level::create([
            'level' => 'Educação Fundamental',
        ]);
        Level::create([
            'level' => 'Educação Médio',
        ]);
        Level::create([
            'level' => 'Educação Superior',
        ]);

    }
}
