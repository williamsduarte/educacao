<?php

use Illuminate\Database\Seeder;
use App\Models\system\address\Address;
class AddressTableSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'zipcode' => '78400-000',
            'city'    => 'Diamantino',
            'state'   => 'Mato Grosso',
        ]);
    }
}
