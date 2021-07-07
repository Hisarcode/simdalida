<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_innovation_step')->constrained('innovation_steps');
            $table->foreignId('id_innovation_initiator')->constrained('innovation_initiators');
            $table->enum('innovation_type', ['digital', 'nonDigital']);
            $table->foreignId('id_innovation_format')->constrained('innovation_formats');
            $table->enum('is_covid', ['covid', 'nonCovid']);
            $table->text('innovation_concern');
            $table->dateTime('start_innovation_trial');
            $table->dateTime('end_innovation_trial');
            $table->dateTime('time_innovation_implement');
            $table->text('innovation_design');
            $table->text('innovation_goal');
            $table->text('innovation_benefit');
            $table->text('innovation_result');
            $table->string('budget');
            $table->text('budget_file');
            $table->string('profil_bisnis');
            $table->string('profil_bisnis_file');
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
        Schema::dropIfExists('innovation_proposals');
    }
}
