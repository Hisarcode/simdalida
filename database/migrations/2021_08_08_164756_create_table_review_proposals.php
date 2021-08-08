<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReviewProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_create_id');
            $table->integer('user_review_id');
            $table->integer('proposal_id');
            $table->string('name')->nullable();
            $table->text('innovation_concern')->nullable();
            $table->text('start_innovation_trial')->nullable();
            $table->text('end_innovation_trial')->nullable();
            $table->text('time_innovation_implement')->nullable();
            $table->text('innovation_design')->nullable();
            $table->text('innovation_goal')->nullable();
            $table->text('innovation_benefit')->nullable();
            $table->text('innovation_result')->nullable();
            $table->string('budget')->nullable();
            $table->string('profil_bisnis')->nullable();
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
        Schema::dropIfExists('review_proposals');
    }
}
