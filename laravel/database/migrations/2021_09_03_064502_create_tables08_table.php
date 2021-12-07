<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables08Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables08', function (Blueprint $table) {
            $table->Increments('id');

            //一つだけユニーク制約
            $table->string('reserv_code',17)->unique();

            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('sales_id');
            $table->integer('user_id')->unsigned();
            $table->string('ticket_name',30);
            $table->integer('tickets_kind');
            $table->datetime('ticket_buyday');
            $table->datetime('ticket_interval_start');
            $table->datetime('ticket_interval_end');
            $table->datetime('ticket_start');
            $table->datetime('ticket_end');
            $table->integer('ticket_total_num');
            $table->datetime('cancel_limit_start');
            $table->datetime('candel_end');
            $table->integer('ticket_status');
            $table->dateTime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->datetime('delete_at')->nullable()->change();

            $table->timestamps();


            //外部キー
            $table->foreign(['biz_id','ticket_code','sales_id'])->references(['biz_id','ticket_code','sales_id'])->on('tables02')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables08');
    }
}
