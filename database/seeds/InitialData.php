<?php

declare(strict_types = 1);

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Services\Seeders\ProductsService;

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
        $productsJsonFile = file_get_contents(storage_path('initial-data') . '/inventory-merqueo.json');
        $ordersJsonFile = file_get_contents(storage_path('initial-data') . '/orders-merqueo.json');

        $providersData = json_decode($providersJsonFile);
        $ordersData = json_decode($ordersJsonFile);

        $productList = ProductsService::getProductList($ordersData);

        foreach ($providersData->providers as $provider) {
            DB::table('providers')->insert([
                'name' => $provider->name,
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime
            ]);

            foreach ($provider->products as $product) {
                if (array_key_exists($product->productId, $productList)) {
                    DB::table('products')->insert([
                        'name' => $productList[$product->productId]->name,
                        'provider_id' => DB::table('providers')
                            ->where('name', '=', $provider->name)
                            ->first()->id
                    ]);
                }
            }
        }
    }
}
