<?php

use Illuminate\Database\Seeder;
use App\Models\system\rh\Link;
class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'description' => 'Contratado',
        ]);
        Link::create([
            'description' => 'Concursado',
        ]);
        Link::create([
            'description' => 'Estagiario',
        ]);
    }
}
