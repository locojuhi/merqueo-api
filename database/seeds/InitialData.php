<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialData extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDateTime = \Carbon\Carbon::now();
        $providersJsonFile = file_get_contents(storage_path('initial-data') . '/providers-merqueo.json');

        $providersData = json_decode($providersJsonFile);
        foreach ($providersData->providers as $provider) {
            DB::table('providers')->insert([
                'name' => $provider->name,
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime
            ]);
        }
    }
}
