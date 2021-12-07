<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables01', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();          //型の不一致を防ぐためunsigned（負なし）unsigned int biz_id;
            $table->string('ticket_code',5);                //引数の５は文字制限
            $table->integer('spot_area_id')->unsigned();
            $table->string('genre_code1',10);
            $table->string('genre_code2',20);
            $table->string('ticket_name',30);
            $table->string('ticket_remarks',200)->nullable()->change();
            $table->integer('tickets_kind');
            $table->integer('minors_flag');
            $table->integer('cancel_flag');
            $table->integer('cancel_limit');
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();

            //複合キー　unique制約
            $table->unique(['biz_id','ticket_code']);//複合ID　第二引数（index)は省略可能 動き問題なし　子テーブルに対してのユニーク制約という考え？
            //biz_idとspot_area_idは外部キーで複合・・・複合ユニーク制約をかけて子テーブルで外部制約をかけて可能？？？

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables01');
    }
}
