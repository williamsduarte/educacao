<?php

use Illuminate\Database\Seeder;
use App\Models\system\educational\Localization;
class LocalizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Localization::create([
            'localization' => 'Urbana',
        ]);
        Localization::create([
            'localization' => 'Rural',
        ]);

    }
}
