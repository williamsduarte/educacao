<?php

use Illuminate\Database\Seeder;
use App\Models\system\educational\Network;
class NetworkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Network::create([
            'network' => 'Municipal',
        ]);
        Network::create([
            'network' => 'Particular',
        ]);
        Network::create([
            'network' => 'Estadual',
        ]);
    }
}
