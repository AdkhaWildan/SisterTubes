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
        Schema::create('disabilitas_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id');
            $table->foreignId('dusun_id');
            $table->string('dusun_nama');
            $table->string('disabilitas_id');
            $table->string('disabilitas');
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
        Schema::dropIfExists('disabilitas_detail');
    }
};