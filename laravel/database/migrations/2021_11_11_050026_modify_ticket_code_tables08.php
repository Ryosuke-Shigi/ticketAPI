<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//おかしなuniqueキー設定がはいっていたので解除

class ModifyTicketCodeTables08 extends Migration
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
            //ユニークキー解除
            $table->dropUnique("tables08_ticket_code_unique");
            $table->dropUnique("tables08_sales_id_unique");
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
            //ユニークキーに変更
            $table->unique('ticket_code');
            $table->unique('sales_id');

        });
    }
}
