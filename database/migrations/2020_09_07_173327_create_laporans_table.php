<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('tajuk', 255);
            $table->dateTime('tarikh');
            $table->string('tahun', 100);
            $table->bigInteger('auditor')->unsigned();
            $table->bigInteger('kcad')->unsigned();
            $table->bigInteger('organisasi_id')->unsigned();
            $table->bigInteger('kategori_id')->unsigned();
            $table->foreign('auditor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kcad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategoriaudit')->onDelete('cascade');
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
        Schema::dropIfExists('laporan');
    }
}
