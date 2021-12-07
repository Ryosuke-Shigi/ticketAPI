<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables05Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables05', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('type_id');
            $table->string('type_name',10);
            $table->integer('type_money');
            $table->integer('cancel_type');
            $table->integer('cancel_rate');
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();

            //ユニーク制約
            $table->unique(['biz_id','ticket_code','type_id']);
            //外部キー
            $table->foreign(['biz_id','ticket_code'])->references(['biz_id','ticket_code'])->on('tables01')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables05');
    }
}
