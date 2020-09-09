<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaklumbalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maklumbalas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jawatankuasa_id')->unsigned();
            $table->bigInteger('auditipenemuan_id')->unsigned();
            $table->bigInteger('auditi')->unsigned();
            $table->bigInteger('progress_id')->unsigned();
            $table->string('maklumbalas', 250);
            $table->string('ulasan', 250);
            $table->foreign('auditipenemuan_id')->references('id')->on('auditipenemuan')->onDelete('cascade');
            $table->foreign('auditi')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jawatankuasa_id')->references('id')->on('jawatankuasa')->onDelete('cascade');
            $table->foreign('progress_id')->references('id')->on('progress')->onDelete('cascade');
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
        Schema::dropIfExists('maklumbalas');
    }
}
