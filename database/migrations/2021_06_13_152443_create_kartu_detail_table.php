<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartu_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_tagihan_id');
            $table->integer('lunas');
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
        Schema::dropIfExists('kartu_detail');
    }
}
