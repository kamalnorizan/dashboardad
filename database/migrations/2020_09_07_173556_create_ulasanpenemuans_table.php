<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlasanpenemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulasanpenemuan', function (Blueprint $table) {
            $table->id();
            $table->string('ulasan', 250);
            $table->bigInteger('auditor')->unsigned();
            $table->bigInteger('kcad')->unsigned();
            $table->bigInteger('penemuan_id')->unsigned();
            $table->bigInteger('progress_id')->unsigned();
            $table->foreign('auditor')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kcad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('penemuan_id')->references('id')->on('penemuan')->onDelete('cascade');
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
        Schema::dropIfExists('ulasanpenemuan');
    }
}
