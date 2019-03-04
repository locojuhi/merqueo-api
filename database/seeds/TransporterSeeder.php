<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Transporter;

class TransporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transporter::class, 50)->create()->each(function($transporter) {
            $transporter->orders()->save(factory(\App\Models\Order::class)->make());
        });
    }
}
