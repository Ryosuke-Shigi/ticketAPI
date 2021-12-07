<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySalesIdTables07Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables07', function (Blueprint $table) {
            $table->integer('sales_id')->unsigned()->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables07', function (Blueprint $table) {
            //
            //$table->dropUnique("tables07_sales_id_unique");
        });
    }
}
