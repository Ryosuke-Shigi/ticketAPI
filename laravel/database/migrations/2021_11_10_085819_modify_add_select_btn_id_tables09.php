<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//tables09にselect_btn_id(integer)をnullableにし忘れていたので修正

class ModifyAddSelectBtnIdTables09 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables09', function (Blueprint $table) {
            //
            $table->integer('select_btn_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables09', function (Blueprint $table) {
            //
            $table->integer('select_btn_id')->nullable(false)->change();
        });
    }
}
