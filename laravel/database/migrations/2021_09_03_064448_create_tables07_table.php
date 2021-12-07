<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables07Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables07', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('sales_id');
            $table->datetime('ticket_interval_start');;
            $table->datetime('ticket_interval_end');
            $table->integer('ticket_days');
            $table->integer('ticket_num');
            $table->integer('ticket_min_num');
            $table->integer('ticket_max_num');
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();

            //ユニーク *****エラーメッセージ訳：SQLSTATE [42000]：構文エラーまたはアクセス違反：1059識別子名 'tables07_biz_id_ticket_code_sales_id_ticket_interval_start_unique'が長すぎます
            //$table->unique(['biz_id','ticket_code','sales_id','ticket_interval_start']);
            $table->unique(['biz_id','ticket_code']);
            //外部
            $table->foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables07');
    }
}
