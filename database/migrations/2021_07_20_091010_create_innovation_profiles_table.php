<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->integer('innovation_proposals_id')->unique();
            $table->text('description');
            $table->string('triwulan1')->nullable();
            $table->string('triwulan2')->nullable();
            $table->string('triwulan3')->nullable();
            $table->string('triwulan4')->nullable();
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
        Schema::dropIfExists('innovation_profiles');
    }
}
