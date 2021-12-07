<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySalesIdTables02Tables07Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tables07', function (Blueprint $table) {
            //
            $table->dropUnique('tables07_biz_id_ticket_code_unique');
            $table->dropUnique('tables07_sales_id_unique');
            $table->unique(['biz_id','ticket_code','sales_id','ticket_interval_start'],'biz_id-ticket_start_unique');
        });

        Schema::table('tables02', function (Blueprint $table) {
            //
            $table->dropUnique('tables02_sales_id_unique');
            $table->dropUnique('tables02_ticket_code_unique');
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

            $table->Unique('sales_id');
            $table->Unique('ticket_code');
        });
        Schema::table('tables07', function (Blueprint $table) {
            //
            $table->dropUnique('biz_id-ticket_start_unique');
            $table->unique(['biz_id','ticket_code']);
            $table->unique(['sales_id']);


        });


    }
}
