@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Laporan Inovasi Daerah</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('innovation-report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="report_year" value="{{\Carbon\Carbon::now('Asia/Jakarta')->year}}">
                <div class="form-group">
                    <label for="innovation_profiles_id"><b>Nama Inovasi</b></label>
                    <select name="innovation_profiles_id" required class="form-control">
                        <option value="">Pilih Nama Inovasi</option>
                        @foreach ($innovation as $proposal)
                        <option value="{{ $proposal->id }}">
                            {{ $proposal->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quartal"><b>Pilih Triwulan</b></label>
                    <select name="quartal" required class="form-control">
                        <option value="">Pilih Laporan Triwulan ke</option>
                        @for ($i = 1; $i <= 4; $i++) <option value="{{ $i }}">{{ "Triwulan Ke- ".  $i}}</option>
                            @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label for="innovation_sk_file"> <b>Upload SK Bupati:</b> <input type="file" name="innovation_sk_file"
                     placeholder="SK bupati" required></label>
                </div>

                <div class="form-group">
                    <label><strong><b>Tahapan Inovasi :</b></strong></label><br>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Inisiatif"> Tahap
                        Inisiatif</label>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Uji Coba"> Tahap Uji
                        Coba</label>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Penerapan"> Tahap
                        Penerapan</label>
                </div>

                <div class="form-group">
                    <label><strong><b>Inisiator Inovasi Daerah:</b></strong></label><br>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Kepala Daerah"> Kepala
                        Daerah</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Anggota DPRD"> Anggota
                        DPRD</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="ASN"> ASN</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Perangkat Daerah"> Perangkat
                        Daerah</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Anggota Masyarakat"> Anggota
                        Masyarakat</label>
                </div>

                <div class="form-group">
                    <label for="innovation_type"><b>Jenis Inovasi Daerah</b></label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_type" id="innovation_type" value="digital" checked> Digital
                    </label>
                    <label>
                        <input type="radio" name="innovation_type" id="innovation_type" value="nonDigital" checked>
                        Non-Digital
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_formats"><b>Bentuk Inovasi Daerah</b></label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="kelolaPemerintah"
                            checked> Inovasi Tata Kelola Pemerintah Daerah
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="pelayananPublik"
                            checked> Inovasi Pelayanan Publik
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="bentukLainnya"
                            checked> Inovasi Bentuk Lainnya sesuai bidang urusan pemerintah daerah
                    </label>
                </div>

                <div class="form-group">
                    <label for="time_innovation_implement"><b>Waktu Inovasi Daerah Diterapkan</b></label>
                    <input type="date" class="form-control" name="time_innovation_implement" placeholder="time"
                        value="{{ old('time_innovation_implement') }}">
                </div>

                <div class="form-group">
                    <label for="problem"><b>Permasalahan/kendala yg dihadapi</b></label>
                        <textarea type="text" name="problem" id="problem" class="form-control" placeholder="Isikan masalah yang dihadapi" required
                        autocomplete="off">{{ old('problem') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="solution"><b>Solusi terhadap Permasalahan/kendala yg dihadapi</b></label>
                        <textarea type="text" name="solution" id="solution" class="form-control" placeholder="Isikan solusi masalah yang dihadapi" required
                        autocomplete="off">{{ old('solution') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="improvement"><b>Tindaklanjut terhadap permasalahan</b></label>
                        <textarea type="text" name="improvement" id="improvement" class="form-control" placeholder="Isikan tindaklanjut dari masalah yang dihadapi" required
                        autocomplete="off">{{ old('improvement') }}</textarea>
                </div>


                <div class="form-group">
                    <label for="complain_innovation_total"><b>Jumlah pengaduan/saran terkait inovasi</b></label>
                    <input type="text" class="form-control" name="complain_innovation_total"
                        placeholder="Isikan Jumlah pengaduan/saran terkait inovasi"
                        value="{{ old('complain_innovation_total') }}" required autocomplete="off">

                    <label for="complain_innovation_file"> <b>Upload dokumen rekapitulasi pengaduan: </b><input type="file"
                            name="complain_innovation_file" placeholder="SK bupati"></label>
                </div>

                <div class="form-group">
                    <label for="complain_improvement_total"><b>Jumlah pengaduan/saran yg sudah ditindaklanjuti</b></label>
                    <input type="text" class="form-control" name="complain_improvement_total"
                        placeholder="Isikan Jumlah pengaduan/saran terkait inovasi"
                        value="{{ old('complain_improvement_total') }}" required autocomplete="off">

                    <label for="complain_improvement_file"> <b>Upload dokumen penyelesaian pengaduan:</b> <input type="file"
                            name="complain_improvement_file" placeholder="SK bupati"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_level"><b>Tingkat Capaian Tujuan Inovasi Daerah</b></label>
                    <input type="text" class="form-control" name="achievement_goal_level"
                        placeholder="Isikan Jumlah pengaduan/saran terkait inovasi"
                        value="{{ old('achievement_goal_level') }}" required autocomplete="off">

                    <label for="achievement_goal_level_file"> <b>Upload dokumen pendukung:</b> <input type="file"
                            name="achievement_goal_level_file"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_problem"><b>Kendala Pencapaian tujuan inovasi daerah</b></label>
                        <textarea type="text" name="achievement_goal_problem" id="achievement_goal_problem" class="form-control" placeholder="Isikan kendala pencapaian tujuan inovasi daerah" required
                        autocomplete="off">{{ old('achievement_goal_problem') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="benefit_level"><b>Tingkat Kemanfaatan Inovasi Daerah</b></label>
                    <input type="text" class="form-control" name="benefit_level"
                        placeholder="Isikan Kemanfaatan Inovasi Daerah" value="{{ old('benefit_level') }}" required
                        autocomplete="off">

                    <label for="benefit_level_file"> <b>Upload dokumen pendukung:</b> <input type="file"
                            name="benefit_level_file"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_result_level"><b>Tingkat Capaian Hasil Inovasi Daerah</b></label>
                    <input type="text" class="form-control" name="achievement_result_level"
                        placeholder="Isikan Kemanfaatan Inovasi Daerah" value="{{ old('achievement_result_level') }}"
                        required autocomplete="off">

                    <label for="achievement_result_level_file"> <b>Upload dokumen pendukung: </b><input type="file"
                            name="achievement_result_level_file"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_result_problem"><b>Kendala Pencapaian hasil inovasi daerah</b></label>
                        <textarea type="text" name="achievement_result_problem" id="achievement_result_problem" class="form-control" placeholder="Isikan kendala pencapaian hasil inovasi daerah" required
                        autocomplete="off">{{ old('achievement_result_problem') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="innovation_strategy"><b>Strategi Pelaksanaan Inovasi</b></label>
                        <textarea type="text" name="innovation_strategy" id="innovation_strategy" class="form-control" placeholder="Isikan strategi pelaksanaan inovasi" required
                        autocomplete="off">{{ old('innovation_strategy') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="video_innovation"><b>Video Inovasi Daerah</b></label>
                        <input type="text" class="form-control" name="video_innovation"
                        placeholder="Masukkan link youtube dari video inovasi"
                        value="{{ old('video_innovation') }}" required autocomplete="off">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection