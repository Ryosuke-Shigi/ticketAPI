<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables03Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables03', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('contents_type');
            $table->integer('contents_index');
            $table->string('contents_data',1000)->nullable()->change();
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();

            //複合ユニーク制約　子テーブルでこのテーブルを指定する時に使う感じだろうか
            $table->unique(['biz_id','ticket_code','contents_type','contents_index']);

            //↓biz_idのみでこの設定をいれてるのはどうなんだろう
            //$table->foreign('biz_id')->references('biz_id')->on('tables01')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign(['biz_id','ticket_code'])->references(['biz_id','ticket_code'])->on('tables01')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables03');
    }
}
