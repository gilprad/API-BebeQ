<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGejalaPenyakitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejala_penyakits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('penyakit_id')->unsigned();
            $table->bigInteger('gejala_id')->unsigned();
            $table->timestamps();
            $table->foreign('penyakit_id')
                ->references('id')
                ->on('penyakits');
            $table->foreign('gejala_id')
                ->references('id')
                ->on('gejalas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gejala_penyakits');
    }
}
