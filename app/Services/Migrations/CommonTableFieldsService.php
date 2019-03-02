<?php

declare(strict_types = 1);

namespace App\Services\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class CommonTableFieldsService
{
    /**
     * @param $tableName
     */
    public static function createTableWithCommonFields($tableName)
    {
        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
