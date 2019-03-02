<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Services\Migrations\CommonTableFieldsService;

class CreateProvidersTable extends Migration
{
    const TableName = 'providers';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        CommonTableFieldsService::createTableWithCommonFields(self::TableName);
        Schema::table(self::TableName, function (Blueprint $table) {
            $table->string('name')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::TableName);
    }
}
