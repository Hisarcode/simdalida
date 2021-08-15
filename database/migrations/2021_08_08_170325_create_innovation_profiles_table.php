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
            $table->text('regulasi_inovasi');
            $table->text('ketersediaan_sdm');
            $table->text('dukungan_anggaran')->nullable();
            $table->text('penggunaan_it')->nullable();
            $table->text('bimtek_inovasi')->nullable();
            $table->text('program_rkpd')->nullable();
            $table->text('keterlibatan_aktor')->nullable();
            $table->text('pelaksana_inovasi')->nullable();
            $table->text('jejaring_inovasi')->nullable();
            $table->text('sosialisasi_inovasi')->nullable();
            $table->text('pedoman_teknis')->nullable();
            $table->text('kemudahan_informasi')->nullable();
            $table->text('kemudahan_proses')->nullable();
            $table->text('penyelesaian_pengaduan')->nullable();
            $table->text('online_sistem')->nullable();
            $table->text('replikasi')->nullable();
            $table->text('kecepatan_inovasi');
            $table->text('kemanfaatan_inovasi');
            $table->text('monitoring_evaluasi');
            $table->text('kualitas_inovasi');
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
