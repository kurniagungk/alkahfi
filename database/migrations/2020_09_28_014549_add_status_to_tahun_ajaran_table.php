<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTahunAjaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tahun_ajaran', function (Blueprint $table) {
            $table->enum('status', ['tidak', 'aktif']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tahun_ajaran', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
