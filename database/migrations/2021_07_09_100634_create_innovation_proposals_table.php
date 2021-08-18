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
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->string('name');
            $table->string('innovation_step');
            $table->string('innovation_initiator');
            $table->enum('innovation_type', ['Digital', 'non-Digital']);
            $table->enum('innovation_formats', ['Kelola Pemerintah', 'Pelayanan Publik', 'Bentuk Lainnya']);
            $table->enum('is_covid', ['covid', 'nonCovid']);
            $table->text('innovation_concern');
            $table->date('start_innovation_trial');
            $table->date('end_innovation_trial');
            $table->date('time_innovation_implement');
            $table->text('innovation_design');
            $table->text('innovation_goal');
            $table->text('innovation_benefit');
            $table->text('innovation_result');
            $table->string('budget')->nullable();
            $table->text('budget_file')->nullable();
            $table->string('profil_bisnis')->nullable();
            $table->string('profil_bisnis_file')->nullable();
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
