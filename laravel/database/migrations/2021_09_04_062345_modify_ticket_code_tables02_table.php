<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTicketCodeTables02Table extends Migration
{
    /**
     * Run the migrations.
     *一度外部キーを子テーブルから削除していく
     * @return void
     */
    public function up()
    {
        Schema::table('tables08', function (Blueprint $table) {
            //
            $table->dropForeign("tables08_biz_id_ticket_code_sales_id_foreign");
        });
        Schema::table('tables07', function (Blueprint $table) {
            $table->dropForeign("tables07_biz_id_ticket_code_sales_id_foreign");
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
            $table->Foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('tables07', function (Blueprint $table) {
            //
            $table->Foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');
        });


    }
}
