<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables09Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables09', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('reserv_code',17);
            $table->integer('svc_id');
            $table->string('svc_name',30);
            $table->integer('svc_type');
            $table->integer('svc_select_type')->unsigned();
            $table->integer('select_bin_id')->unsigned()->nullable()->change();
            $table->integer('usage_time');
            $table->integer('svc_status');
            $table->datetime('svc_start')->nullable()->change();
            $table->datetime('svc_end')->nullable()->change();
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->datetime('deleted_at')->nullable()->change();
            $table->timestamps();

            //ユニークキー
            $table->unique(['reserv_code','svc_id']);

            //外部キー
            $table->foreign('reserv_code')->references('reserv_code')->on('tables08')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables09');
    }
}
