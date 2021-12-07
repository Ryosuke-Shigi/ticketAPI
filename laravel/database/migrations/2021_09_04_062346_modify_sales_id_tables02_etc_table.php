<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySalesIdTables02EtcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables02', function (Blueprint $table) {
            //
            $table->string('ticket_code',5)->unique()->change();
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
        Schema::table('tables02', function (Blueprint $table) {
            //
            $table->dropUnique("tables02_ticket_code_unique");
            $table->dropUnique("tables02_sales_id_unique");

        });
    }
}
