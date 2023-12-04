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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_userEvent');
            $table->foreign('id_userEvent')->references('id')->on('user_event')->onDelete('cascade');
            $table->string('nama_event', 50);
            $table->string('deskripsi_event',100);
            $table->string('foto_event');
            $table->string('lokasi', 100);
            $table->time('waktu')->default('00:00');
            $table->date('tanggal_event');
            $table->string('status', 20);            
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
        Schema::dropIfExists('event');
    }
};
