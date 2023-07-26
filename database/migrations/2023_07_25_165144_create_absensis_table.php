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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_absen');
            $table->unsignedBigInteger('anggota_id');
            $table->foreign('anggota_id')->references('id')->on('anggotas');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('absensis');
    }
};
// $2y$10$uZzamyHrhiZLm3HfOreM3O9ctzT4HV3NxnoZTPzgesxDJzi/ktq0m
