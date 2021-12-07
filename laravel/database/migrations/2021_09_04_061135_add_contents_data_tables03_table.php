<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContentsDataTables03Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables03', function (Blueprint $table) {
            //
            $table->string('contents_data',1000)->nullable()->after('contents_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables03', function (Blueprint $table) {
            //
            $table->dropColumn('contents_data');
        });
    }
}
