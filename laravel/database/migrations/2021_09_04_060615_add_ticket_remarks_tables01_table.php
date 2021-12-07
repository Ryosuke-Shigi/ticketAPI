<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketRemarksTables01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tables01', function (Blueprint $table) {
            //
            $table->string('ticket_remarks',200)->nullable()->after('ticket_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables01', function (Blueprint $table) {
            //
            $table->dropColumn('ticket_remarks');
        });
    }
}
