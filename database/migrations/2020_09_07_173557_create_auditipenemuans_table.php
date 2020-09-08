<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditipenemuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditipenemuan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('auditi')->unsigned();
            $table->bigInteger('laporan_id')->unsigned();
            $table->bigInteger('penemuan_id')->unsigned();
            $table->bigInteger('organisasi_id')->unsigned();
            $table->bigInteger('progress_id')->unsigned();
            $table->foreign('auditi')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');
            $table->foreign('penemuan_id')->references('id')->on('penemuan')->onDelete('cascade');
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onDelete('cascade');
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
        Schema::dropIfExists('auditipenemuan');
    }
}
