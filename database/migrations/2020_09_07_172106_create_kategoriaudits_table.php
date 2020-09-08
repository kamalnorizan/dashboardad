<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriauditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoriaudit', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->bigInteger('subkategori')->unsigned()->nullable();
            $table->foreign('subkategori')->references('id')->on('kategoriaudit')->onDelete('cascade');
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
        Schema::dropIfExists('kategoriaudit');
    }
}
