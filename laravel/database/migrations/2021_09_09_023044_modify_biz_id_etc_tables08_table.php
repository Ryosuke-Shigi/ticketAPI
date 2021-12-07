<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBizIdEtcTables08Table extends Migration
{
    /**
     * Run the migrations.
     * tables08の外部キーを単独から複合へ戻す
     * tables08以下の外部キーは関与しないカラムなので即実行
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables08', function (Blueprint $table) {
            //tables08の外部キーを解除する
            $table->dropForeign('tables08_biz_id_foreign');
            $table->dropForeign('tables08_sales_id_foreign');
            $table->dropForeign('tables08_ticket_code_foreign');
            //複合ユニーク作成
            $table->Unique(['biz_id','ticket_code','sales_id']);
            //外部キー接続
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


            //複合外部キー解除
            $table->dropForeign('tables08_biz_id_ticket_code_sales_id_foreign');
            //複合ユニーク解除
            $table->dropUnique('tables08_biz_id_ticket_code_sales_id_unique');
            //単独外部キー設定
            $table->Foreign('biz_id')->references('biz_id')->on('tables02')->onUpdate('cascade')->onDelete('cascade');
            $table->Foreign('sales_id')->references('sales_id')->on('tables02')->onUpdate('cascade')->onDelete('cascade');
            $table->Foreign('ticket_code')->references('ticket_code')->on('tables02')->onUpdate('cascade')->onDelete('cascade');


        });
    }
}
