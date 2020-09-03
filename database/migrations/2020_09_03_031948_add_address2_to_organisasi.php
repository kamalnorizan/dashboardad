<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddress2ToOrganisasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organisasi', function (Blueprint $table) {
            $table->renameColumn('address', 'address1');
            $table->string('address2', 255)->nullable()->after('address');
            $table->dropColumn('level');
            $table->dropColumn('mukim');
            $table->dropColumn('district');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisasi', function (Blueprint $table) {
            $table->renameColumn('address1', 'address');
            $table->dropColumn('address2');
            $table->string('level', 100);
            $table->string('mukim', 100);
            $table->string('district', 100);
        });
    }
}
