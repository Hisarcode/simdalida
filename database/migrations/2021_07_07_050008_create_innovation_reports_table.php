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
            $table->string('name');
            $table->text('innovation_sk_file');
            $table->foreignId('id_innovation_step')->constrained('innovation_steps');
            $table->foreignId('id_innovation_initiator')->constrained('innovation_initiators');
            $table->enum('innovation_type', ['digital', 'nonDigital']);
            $table->enum('innovation_formats', ['kelolaPemerintah', 'pelayananPublik', 'bentukLainnya']);
            $table->dateTime('time_innovation_implement');
            $table->text('problem');
            $table->text('solution');
            $table->text('improvement');
            $table->string('complain_innovation_total');
            $table->text('complain_innovation_file');
            $table->string('complain_improvement_total');
            $table->text('complain_improvement_file');
            $table->string('achievement_goal_level');
            $table->text('achievement_goal_level_file');
            $table->string('achievement_goal_problem');
            $table->string('benefit_level');
            $table->text('benefit_level_file');
            $table->string('achievement_result_level');
            $table->text('achievement_result_level_file');
            $table->text('achievement_result_problem');
            $table->text('innovation_strategy');
            $table->text('video_innovation');
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
