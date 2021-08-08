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
            $table->text('dukungan_anggaran');
            $table->text('penggunaan_it');
            $table->text('bimtek_inovasi');
            $table->text('program_rkpd');
            $table->text('keterlibatan_aktor');
            $table->text('pelaksana_inovasi');
            $table->text('jejaring_inovasi');
            $table->text('sosialisasi_inovasi');
            $table->text('pedoman_teknis');
            $table->text('kemudahan_informasi');
            $table->text('kemudahan_proses');
            $table->text('penyelesaian_pengaduan');
            $table->text('online_sistem');
            $table->text('replikasi');
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
