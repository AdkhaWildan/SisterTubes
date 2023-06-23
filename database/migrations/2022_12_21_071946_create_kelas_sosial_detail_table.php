<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_sosial_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id');
            $table->foreignId('dusun_id');
            $table->string('dusun_nama');
            $table->string('kelas_sosial_id');
            $table->string('kelas_sosial');
            $table->integer('total');
            $table->dateTime('harvested_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_sosial_detail');
    }
};