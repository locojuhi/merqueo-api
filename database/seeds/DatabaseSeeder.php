<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InitialData::class);
        $this->call(WarehouseSeeder::class);
        $this->call(FillInventoryTable::class);
        $this->call(TransporterSeeder::class);
        $this->call(OrderProductSeeder::class);
    }
}
