<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nis');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('alamat');
            $table->bigInteger('pos');
            $table->string('wali');
            $table->string('telepon');
            $table->string('status');
            $table->year('tahun');
            $table->string('foto');
            $table->bigInteger('sekolah_id');
            $table->bigInteger('kelas_id');
            $table->bigInteger('asrama_id');
            $table->string('wilayah_id');
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
        Schema::dropIfExists('santri');
    }
}
