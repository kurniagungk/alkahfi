<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModiveUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nism')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('pos')->nullable();
            $table->string('wali')->nullable();
            $table->string('telepon')->nullable();
            $table->string('status')->nullable();
            $table->year('tahun')->nullable();
            $table->string('foto')->nullable();
            $table->bigInteger('asrama_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
