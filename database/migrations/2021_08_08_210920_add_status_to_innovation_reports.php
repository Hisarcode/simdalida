<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToInnovationReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('innovation_reports', function (Blueprint $table) {
            $table->enum('status', ['KIRIM', 'DRAFT']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('innovation_reports', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
