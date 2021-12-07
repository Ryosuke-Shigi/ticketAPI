<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables06Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables06', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('svc_id');
            $table->string('svc_name',30);
            $table->string('svc_cautions',300);
            $table->integer('svc_type');
            $table->integer('svc_select_type');
            $table->integer('usage_time');
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();
            //複合ユニーク
            $table->unique(['biz_id','ticket_code','svc_id']);

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
        Schema::dropIfExists('tables06');
    }
}
