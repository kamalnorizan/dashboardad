<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgressJawatankuasaToAuditipenemuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auditipenemuan', function (Blueprint $table) {
            $table->string('status_hantar', 100)->default('auditi')->after('progress_id');
            $table->integer('status_jawatankuasa')->unsigned()->default(0)->after('status_hantar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auditipenemuan', function (Blueprint $table) {
            $table->dropColumn('status_hantar');
            $table->dropColumn('status_jawatankuasa');
        });
    }
}
