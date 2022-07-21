<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mengajars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelajaran');
            $table->string('hari');
            $table->dateTime('jam_awal');
            $table->dateTime('jam_akhir');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_mapel')->constrained('mapels');
            $table->foreignId('id_kelas')->constrained('kelas');
            $table->foreignId('id_semester')->constrained('semesters');
            $table->foreignId('id_thajaran')->constrained('thajarans');
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
        Schema::dropIfExists('mengajars');
    }
}
