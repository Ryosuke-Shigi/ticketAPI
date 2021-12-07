<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables04Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables04', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('biz_id')->unsigned();
            $table->string('ticket_code',5);
            $table->integer('cautions_type');
            $table->integer('cautions_index');
            $table->string('cautions_text',1000)->nullable()->change();
            $table->datetime('created_at')->nullable()->change();
            $table->datetime('updated_at')->nullable()->change();
            $table->timestamps();

            //ユニーク制約
            $table->unique(['biz_id','ticket_code','cautions_type','cautions_index']);

            $table->foreign(['biz_id','ticket_code'])->references(['biz_id','ticket_code'])->on('tables01')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables04');
    }
}
