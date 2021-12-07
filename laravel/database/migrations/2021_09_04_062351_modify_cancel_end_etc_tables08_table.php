<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyCancelEndEtcTables08Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables08', function (Blueprint $table) {
            //カラム名変更
            $table->renameColumn('candel_end','cancel_end');
            //ユニークキーに変更
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
        Schema::table('tables08', function (Blueprint $table) {
            //カラム名変更
            $table->renameColumn('cancel_end','candel_end');
            //ユニークキー解除
            $table->dropUnique("tables08_ticket_code_unique");
            $table->dropUnique("tables08_sales_id_unique");
        });
    }
}
