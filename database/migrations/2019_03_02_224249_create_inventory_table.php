<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Services\Migrations\CommonTableFieldsService;

class CreateInventoryTable extends Migration
{
    const TABLE_NAME = 'inventories';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        CommonTableFieldsService::createTableWithCommonFields(self::TABLE_NAME);
        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('quantity');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
}
