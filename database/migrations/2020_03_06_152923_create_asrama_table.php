<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama', function (Blueprint $table) {
            $table->bigIncrements('kode');
            $table->char('nama', 100);
            $table->integer('jumlah');
            $table->enum('kelamin', ['L', 'P']);
            $table->char('Keterangan', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama');
    }
}
