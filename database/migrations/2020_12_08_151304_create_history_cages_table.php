<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryCagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_cages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cage_id');
            $table->integer('num');
            $table->string('value');
            $table->enum('status',['penambahan','pengurangan']);
            $table->timestamps();
            $table->foreign('cage_id')
                ->references('id')
                ->on('cages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_cages');
    }
}
