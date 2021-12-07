<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSvcStartEtcTables09Table extends Migration
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
            $table->datetime('svc_start')->nullable()->after('svc_status');
            $table->datetime('svc_end')->nullable()->after('svc_start');
            $table->datetime('deleted_at')->nullable()->after('updated_at');
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
            $table->dropColumn('svc_start');
            $table->dropColumn('svc_end');
            $table->dropColumn('deleted_at');
        });
    }
}
