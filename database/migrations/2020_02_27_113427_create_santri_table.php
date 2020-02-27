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
            $table->bigIncrements('id_santri');
            $table->char('no_induk', 100);
            $table->char('nama', 100);
            $table->char('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->char('alamat', 100);
            $table->char('asrama', 100);
            $table->char('sekolah', 100);
            $table->integer('id_kelas');
            $table->integer('id_tahun');
            $table->char('nama_wali', 100);
            $table->char('telepon', 100);
            $table->enum('status', ['santri', 'pengurus', 'alumni']);
            $table->char('foto', 100);
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
        Schema::dropIfExists('santrii');
    }
}
