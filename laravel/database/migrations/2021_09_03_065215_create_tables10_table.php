<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables10', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('reserv_code',17);
            $table->integer('type_id');
            $table->string('type_name',10);
            $table->integer('type_money');
            $table->integer('buy_num');
            $table->integer('cancel_money');
            $table->datetime('creted_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->datetime('deleted_at')->nullable()->change();
            $table->timestamps();

            //ユニークキー
            $table->unique(['reserv_code','type_id']);
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
        Schema::dropIfExists('tables10');
    }
}
