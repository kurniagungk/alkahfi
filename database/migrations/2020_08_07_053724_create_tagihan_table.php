<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->uuid('id');
            $table->bigInteger('jenis_tagihan_id');
            $table->uuid('santri_id');
            $table->date('tempo');
            $table->bigInteger('jumlah');
            $table->enum('status', ['belum', 'lunas']);
            $table->bigInteger('teler');
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
        Schema::dropIfExists('tagihan');
    }
}
