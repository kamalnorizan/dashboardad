<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawatankuasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawatankuasa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('laporan_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('posisi', 100);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');
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
        Schema::dropIfExists('jawatankuasa');
    }
}
