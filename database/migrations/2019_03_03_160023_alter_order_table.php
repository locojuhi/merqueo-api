<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrderTable extends Migration
{
    const TABLE_NAME = 'orders';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->enum('status', ['pending', 'dispatched'])->default('pending');
            $table->unsignedBigInteger('transporter_id')->nullable();
            $table->foreign('transporter_id')
                ->references('id')
                ->on('transporters')
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
        Schema::table(self::TABLE_NAME, function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropIndex('orders_transporter_id_foreign');
            $table->dropColumn('transporter_id');
        });
    }
}
