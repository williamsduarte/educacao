<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressTableSedder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(CivilTableSeeder::class);
        $this->call(PhysicalPersonTableSedder::class);
        $this->call(PrefectureTableSedder::class);
        $this->call(SecretaryTableSedder::class);
        $this->call(SectorTableSedder::class);
        $this->call(ConditionTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(EmployeeTableSedder::class);
        $this->call(UserTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(RegimeTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(LocalizationTableSeeder::class);
        $this->call(NetworkTableSeeder::class);
        $this->call(KnowleadgeTableSeeder::class);
    }
}
