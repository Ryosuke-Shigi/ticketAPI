<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class ModifyCreatedAtEtcAlltablesTable extends Migration
{
    /**
     * Run the migrations.
     *実験的なもの含む（複数変更）
     * @return void
     */

    public $tb_name=array('tables01','tables02','tables03','tables04','tables05','tables06','tables07','tables08','tables09','tables10');

    public function up()
    {
        /*まとめて各テーブルの修正をかける*/
        for($i=0;$i<10;$i++){
            Schema::table($this->tb_name[$i], function (Blueprint $table) {
                $table->datetime('created_at')->change();
                $table->datetime('updated_at')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        for($i=0;$i<10;$i++){
            Schema::table($this->tb_name[$i], function (Blueprint $table) {
                //位置をずらさないようにするために　仮のtempを作成する
                $table->integer('temp')->after('updated_at');
                //->change()はtimestampに対応できないので、一度消す
                $table->dropColumn('created_at')->change();
                $table->dropColumn('updated_at')->change();
                //再度、同じ宣言のしかたでつくる　これでtimestampがつく
                $table->datetime('created_at')->nullable()->change()->after('temp');
                $table->datetime('updated_at')->nullable()->change()->after('created_at');
                //仮カラムを消す
                $table->dropColumn('temp');
            });
        }
    }
}
