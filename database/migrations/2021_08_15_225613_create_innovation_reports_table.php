<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovation_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id');
            $table->integer('innovation_proposals_id');
            $table->string('name');
            $table->text('innovation_sk_file')->nullable();
            $table->string('innovation_step');
            $table->string('innovation_initiator');
            $table->enum('innovation_type', ['Digital', 'non-Digital']);
            $table->enum('innovation_formats', ['Kelola Pemerintah', 'Pelayanan Publik', 'Bentuk Lainnya']);
            $table->dateTime('time_innovation_implement');
            $table->text('problem');
            $table->text('solution');
            $table->text('improvement');
            $table->string('complain_innovation_total');
            $table->text('complain_innovation_file')->nullable();
            $table->string('complain_improvement_total');
            $table->text('complain_improvement_file')->nullable();
            $table->string('achievement_goal_level');
            $table->text('achievement_goal_level_file')->nullable();
            $table->string('achievement_goal_problem');
            $table->string('benefit_level');
            $table->text('benefit_level_file')->nullable();
            $table->string('achievement_result_level');
            $table->text('achievement_result_level_file')->nullable();
            $table->text('achievement_result_problem');
            $table->text('innovation_strategy');
            $table->text('video_innovation');
            $table->integer('quartal');
            $table->year('report_year');
            $table->enum('status', ['KIRIM', 'DRAFT']);
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
        Schema::dropIfExists('innovation_reports');
    }
}
