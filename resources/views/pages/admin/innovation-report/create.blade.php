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
                    <label for="innovation_profiles_id">Nama Inovasi</label>
                    <select name="innovation_profiles_id" required class="form-control">
                        <option value="">Pilih Nama Inovasi Berdasarkan profil</option>
                        @foreach ($innovation as $proposal)
                        <option value="{{ $proposal->id }}">
                            {{ $proposal->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quartal">Pilih Triwulan</label>
                    <select name="quartal" required class="form-control">
                        <option value="">Pilih Laporan Triwulan ke</option>
                        @for ($i = 1; $i <= 4; $i++) <option value="{{ $i }}">{{ "Triwulan Ke- ".  $i}}</option>
                            @endfor
                    </select>
                </div>

                <div class="form-group">
                    {{-- <label for="name">Nama Inovasi Daerah</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Inovasi" value="{{ old('name') }}"
                    required autocomplete="off">
                    --}}
                    <label for="innovation_sk_file"> Upload SK Bupati: <input type="file" name="innovation_sk_file"
                            placeholder="SK bupati"></label>
                </div>

                <div class="form-group">
                    <label><strong>Tahapan Inovasi :</strong></label><br>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Inisiatif"> Tahap
                        Inisiatif</label>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Uji Coba"> Tahap Uji
                        Coba</label>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Penerapan"> Tahap
                        Penerapan</label>
                </div>

                <div class="form-group">
                    <label><strong>Inisiator Inovasi Daerah:</strong></label><br>
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
                    <label for="innovation_type">Jenis Inovasi Daerah</label>
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
                    <label for="innovation_formats">Bentuk Inovasi Daerah</label>
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
                    <label for="time_innovation_implement">Waktu Inovasi Daerah Diterapkan</label>
                    <input type="date" class="form-control" name="time_innovation_implement" placeholder="time"
                        value="{{ old('time_innovation_implement') }}">
                </div>

                <div class="form-group">
                    <label for="problem">Permasalahan/kendala yg dihadapi</label>
                    <input type="text" class="form-control" name="problem" placeholder="Isikan masalah yg dihadapi"
                        value="{{ old('problem') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="solution">Solusi terhadap Permasalahan/kendala yg dihadapi</label>
                    <input type="text" class="form-control" name="solution"
                        placeholder="Isikan solusi dari permasalahan" value="{{ old('solution') }}" required
                        autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="improvement">Tindaklanjut terhadap permasalahan</label>
                    <input type="text" class="form-control" name="improvement"
                        placeholder="Isikan Tindaklanjut terhadap permasalahan" value="{{ old('improvement') }}"
                        required autocomplete="off">
                </div>


                <div class="form-group">
                    <label for="complain_innovation_total">Jumlah pengaduan/saran terkait inovasi</label>
                    <input type="text" class="form-control" name="complain_innovation_total"
                        placeholder="Isikan Jumlah pengaduan/saran terkait inovasi"
                        value="{{ old('complain_innovation_total') }}" required autocomplete="off">

                    <label for="complain_innovation_file"> Upload dokumen rekapitulasi pengaduan: <input type="file"
                            name="complain_innovation_file" placeholder="SK bupati"></label>
                </div>

                <div class="form-group">
                    <label for="complain_improvement_total">Jumlah pengaduan/saran yg sudah ditindaklanjuti</label>
                    <input type="text" class="form-control" name="complain_improvement_total"
                        placeholder="Isikan Jumlah pengaduan/saran terkait inovasi"
                        value="{{ old('complain_improvement_total') }}" required autocomplete="off">

                    <label for="complain_improvement_file"> Upload dokumen penyelesaian pengaduan: <input type="file"
                            name="complain_improvement_file" placeholder="SK bupati"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_level">Tingkat Capaian Tujuan Inovasi Daerah</label>
                    <input type="text" class="form-control" name="achievement_goal_level"
                        placeholder="Isikan Jumlah pengaduan/saran terkait inovasi"
                        value="{{ old('achievement_goal_level') }}" required autocomplete="off">

                    <label for="achievement_goal_level_file"> Upload dokumen pendukung: <input type="file"
                            name="achievement_goal_level_file"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_problem">Kendala Pencapaian tujuan inovasi daerah</label>
                    <input type="text" class="form-control" name="achievement_goal_problem"
                        placeholder="Isikan Kendala Pencapaian tujuan inovasi daerah"
                        value="{{ old('achievement_goal_problem') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="benefit_level">Tingkat Kemanfaatan Inovasi Daerah</label>
                    <input type="text" class="form-control" name="benefit_level"
                        placeholder="Isikan Kemanfaatan Inovasi Daerah" value="{{ old('benefit_level') }}" required
                        autocomplete="off">

                    <label for="benefit_level_file"> Upload dokumen pendukung: <input type="file"
                            name="benefit_level_file"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_result_level">Tingkat Capaian Hasil Inovasi Daerah</label>
                    <input type="text" class="form-control" name="achievement_result_level"
                        placeholder="Isikan Kemanfaatan Inovasi Daerah" value="{{ old('achievement_result_level') }}"
                        required autocomplete="off">

                    <label for="achievement_result_level_file"> Upload dokumen pendukung: <input type="file"
                            name="achievement_result_level_file"></label>
                </div>

                <div class="form-group">
                    <label for="achievement_result_problem">Kendala Pencapaian hasil inovasi daerah</label>
                    <input type="text" class="form-control" name="achievement_result_problem"
                        placeholder="Isikan Kendala Pencapaian hasil inovasi daerah"
                        value="{{ old('achievement_result_problem') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="innovation_strategy">Strategi Pelaksanaan Inovasi</label>
                    <input type="text" class="form-control" name="innovation_strategy"
                        placeholder="Isikan Strategi Pelaksanaan Inovasi value=" {{ old('innovation_strategy') }}"
                        required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="video_innovation">Video Inovasi Daerah</label>
                    <input type="file" class="form-control" name="video_innovation" placeholder="video_innovation"
                        class="form-control">
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