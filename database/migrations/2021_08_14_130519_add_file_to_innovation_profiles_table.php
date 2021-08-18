<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileToInnovationProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('innovation_profiles', function (Blueprint $table) {
            $table->text('regulasi_inovasi_file')->nullable();
            $table->text('ketersediaan_sdm_file')->nullable();
            $table->text('dukungan_anggaran_file')->nullable();
            $table->text('penggunaan_it_file')->nullable();
            $table->text('bimtek_inovasi_file')->nullable();
            $table->text('program_rkpd_file')->nullable();
            $table->text('keterlibatan_aktor_file')->nullable();
            $table->text('pelaksana_inovasi_file')->nullable();
            $table->text('jejaring_inovasi_file')->nullable();
            $table->text('sosialisasi_inovasi_file')->nullable();
            $table->text('pedoman_teknis_file')->nullable();
            $table->text('kemudahan_informasi_file')->nullable();
            $table->text('kemudahan_proses_file')->nullable();
            $table->text('penyelesaian_pengaduan_file')->nullable();
            $table->text('online_sistem_file')->nullable();
            $table->text('replikasi_file')->nullable();
            $table->text('kecepatan_inovasi_file')->nullable();
            $table->text('kemanfaatan_inovasi_file')->nullable();
            $table->text('monitoring_evaluasi_file')->nullable();
            $table->text('kualitas_inovasi_file')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('innovation_profiles', function (Blueprint $table) {
            $table->dropColumn('regulasi_inovasi_file');
            $table->dropColumn('ketersediaan_sdm_file');
            $table->dropColumn('dukungan_anggaran_file');
            $table->dropColumn('penggunaan_it_file');
            $table->dropColumn('bimtek_inovasi_file');
            $table->dropColumn('program_rkpd_file');
            $table->dropColumn('keterlibatan_aktor_file');
            $table->dropColumn('pelaksana_inovasi_file');
            $table->dropColumn('jejaring_inovasi_file');
            $table->dropColumn('sosialisasi_inovasi_file');
            $table->dropColumn('pedoman_teknis_file');
            $table->dropColumn('kemudahan_informasi_file');
            $table->dropColumn('kemudahan_proses_file');
            $table->dropColumn('penyelesaian_pengaduan_file');
            $table->dropColumn('online_sistem_file');
            $table->dropColumn('replikasi_file');
            $table->dropColumn('kecepatan_inovasi_file');
            $table->dropColumn('kemanfaatan_inovasi_file');
            $table->dropColumn('monitoring_evaluasi_file');
            $table->dropColumn('kualitas_inovasi_file');
        });
    }
}
