<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTables08BizIdTicketCodeSalesIdUniqueTables08 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables08', function (Blueprint $table) {
            //
            $table->dropForeign("tables08_biz_id_ticket_code_sales_id_foreign");
            $table->dropUnique('tables08_biz_id_ticket_code_sales_id_unique');
            $table->Foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables08', function (Blueprint $table) {
            //
            $table->dropForeign('tables08_biz_id_ticket_code_sales_id_foreign');
            $table->Unique(['biz_id','ticket_code','sales_id']);
            $table->Foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');

       });
    }
}
