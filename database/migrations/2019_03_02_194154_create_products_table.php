<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Services\Migrations\CommonTableFieldsService;

class CreateProductsTable extends Migration
{
    const TABLE_NAME = 'products';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        CommonTableFieldsService::createTableWithCommonFields(self::TABLE_NAME);
        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->unsignedInteger('provider_id')->nullable();
            $table->foreign('provider_id')
                ->references('id')
                ->on(CreateProvidersTable::TableName)
                ->onDelete('cascade')
            ;
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
