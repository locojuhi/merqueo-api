<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Services\Migrations\CommonTableFieldsService;

class CreateWarehousesTable extends Migration
{
    const TABLE_NAME = 'warehouses';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        CommonTableFieldsService::createTableWithCommonFields(self::TABLE_NAME);

        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->string('name');
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
