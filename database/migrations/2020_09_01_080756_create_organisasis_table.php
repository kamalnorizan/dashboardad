<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('nickname', 250);
            $table->bigInteger('org_type_id')->unsigned();
            $table->string('level', 100);
            $table->string('address', 250)->nullable();
            $table->string('postcode', 5)->nullable();
            $table->string('mukim', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->bigInteger('negeri_id')->unsigned();
            $table->string('email', 250);
            $table->string('phoneNumber', 20);
            $table->string('faxNumber', 20);
            $table->string('code_ppk', 10);
            $table->foreign('org_type_id')->references('id')->on('org_types')->onDelete('cascade');
            $table->foreign('negeri_id')->references('id')->on('negeri')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisasi');
    }
}
