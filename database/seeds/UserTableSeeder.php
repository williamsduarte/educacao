<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            User::create([
                'employee_id' => '1',
                'nickname'    => '@mattheus',
                'email'       => 'mattheusgzmuller@gmail.com',
                'password'    => bcrypt('1234567890'),
                'phrase'      => 'Deixe pra trás o que não te leva pra frente'
            ]);
    }
}
