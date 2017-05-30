<?php

use Illuminate\Database\Seeder;
use App\Models\system\educational\Knowleadge;
class KnowleadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Knowleadge::create([
            'name' => 'Matemática e suas Tecnologias',
        ]);
        Knowleadge::create([
            'name' => 'Ciencias Humanas e suas Tecnologias',
        ]);
        Knowleadge::create([
            'name' => 'Linguagens, Códigos e suas Tecnologias',
        ]);
        Knowleadge::create([
            'name' => 'Ciencias da Natureza e suas Tecnologias',
        ]);
    }
}
