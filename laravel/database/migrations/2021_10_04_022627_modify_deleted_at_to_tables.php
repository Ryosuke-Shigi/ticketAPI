<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDeletedAtToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*         Schema::table('tables01', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
        Schema::table('tables02', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
        Schema::table('tables03', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
        Schema::table('tables04', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
        Schema::table('tables05', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
        Schema::table('tables06', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
        Schema::table('tables07', function (Blueprint $table) {
            //softdelete追加
            $table->softDeletes();
        });
 */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
/*         Schema::table('tables01', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tables02', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tables03', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tables04', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tables05', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tables06', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });
        Schema::table('tables07', function (Blueprint $table) {
            //
            $table->dropSoftDeletes();
        });*/


    }
}
