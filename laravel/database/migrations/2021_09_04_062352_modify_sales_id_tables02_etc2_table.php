<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySalesIdTables02Etc2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tables07', function (Blueprint $table) {
            $table->foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('tables08', function (Blueprint $table) {
        //FKを単一に
            $table->foreign('biz_id')->references('biz_id')->on('tables02')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ticket_code')->references('ticket_code')->on('tables02')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sales_id')->references('sales_id')->on('tables02')->onUpdate('cascade')->onDelete('cascade');
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
            //$table->dropforeign("tables07_biz_id_ticket_code_sales_id_foreign");
        });
        Schema::table('tables08', function (Blueprint $table) {
        //FKを単一に
            $table->dropforeign("tables08_biz_id_foreign");
            $table->dropforeign("tables08_sales_id_foreign");
            $table->dropforeign("tables08_ticket_code_foreign");
        });

    }
}
