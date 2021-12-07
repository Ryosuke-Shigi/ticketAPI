<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCautionsTextTables04Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables04', function (Blueprint $table) {
            //
            $table->string('cautions_text',1000)->nullable()->after('cautions_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables04', function (Blueprint $table) {
            //
            $table->dropColumn('cautions_text');
        });
    }
}
