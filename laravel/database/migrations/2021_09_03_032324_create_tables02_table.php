<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables02Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables02', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('sales_id');
            $table->datetime('sales_interval_start');
            $table->datetime('sales_interval_end');
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();

            //uniqueキー設定 []で区切って第一引数に　
            $table->unique(['biz_id','ticket_code','sales_id']);

            //外部キー制約      'cascade'…リレーション先と一緒に　自動削除 onDelete 自動更新 onUpdate
            //foreign(カラム名)->reference(親の主キー)->on(親のテーブル名)->onDelete('cascade')->onUpdate('cascade');
            //foreign([カラム１,カラム２])　で複合外部キーみたいにできる・・・？
            //単カラムでunique制約をかけて一意の値にしてforeignで[]でまとめてとか？

            //単カラムでユニーク制約をつけていない以上　biz_id　だけでこの設定は危ないのでは　と思う　一応おいとく
            //↓これ、消さないとだめかも
            //$table->foreign('biz_id')->references('biz_id')->on('tables01')->onDelete('cascade')->onUpdate('cascade');

            //？？？複合キー指定？で通る。　biz_id と　ticket_codeの組み合わせで一意の値を作っているのだから個別の指定はできていると
            //親で作成している複合キー(biz_id,ticket_code)を使ってrowを指定する？
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
        Schema::dropIfExists('tables02');
    }
}
