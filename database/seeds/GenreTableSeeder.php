<?php

use Illuminate\Database\Seeder;
use App\Models\system\folks\Genre;
class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::create([
            'genre' => 'Masculino'
        ]);
        Genre::create([
            'genre' => 'Feminino'
        ]);
    }
}
