@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Profil Inovasi Daerah</h1>
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
            <form action="{{ route('innovation-profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">

                <div class="form-group">
                    <p>Catatan :<b>profil inovasi bersifat unik</b> (setiap 1 proposal hanya boleh memiliki 1 profil saja)</p>
                    <P><b>*Indikator Wajib Isi</b></P>
                    <label for="innovation_proposals_id"><strong>Nama Inovasi*</strong></label>
                    <select name="innovation_proposals_id" required class="form-control">
                        <option value="">Pilih Nama Inovasi Berdasarkan Proposal</option>
                        @foreach ($innovation_proposals as $proposal)
                        <option value="{{ $proposal->id }}">
                            {{ $proposal->name }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="regulasi_inovasi"><strong>Regulasi Inovasi Daerah*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="regulasi_inovasi" id="regulasi_inovasi" class="form-control" required autocomplete="off">{{ old('regulasi_inovasi') }}</textarea>
                            <label for="regulasi_inovasi_file"> Upload file SK (PDF):  <input type="file" name="regulasi_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="ketersediaan_sdm"><strong>Ketersediaan SDM terhadap inovasi daerah*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="ketersediaan_sdm" id="ketersediaan_sdm" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('ketersediaan_sdm') }}</textarea>
                            <label for="ketersediaan_sdm_file"> Upload file SK (PDF):  <input type="file" name="ketersediaan_sdm_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="dukungan_anggaran"><strong>Dukungan Anggaran</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="dukungan_anggaran" id="dukungan_anggaran" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('dukungan_anggaran') }}</textarea>
                            <label for="dukungan_anggaran_file"> Upload file SK (PDF):  <input type="file" name="dukungan_anggaran_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="penggunaan_it"><strong>Penggunaan IT</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="penggunaan_it" id="penggunaan_it" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('penggunaan_it') }}</textarea>
                            <label for="penggunaan_it_file"> Upload file pendukung (PDF  ):  <input type="file" name="penggunaan_it_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="bimtek_inovasi"><strong>Bimtek Inovasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="bimtek_inovasi" id="bimtek_inovasi" class="form-control"
                            placeholder=" " 
                            autocomplete="off">{{ old('bimtek_inovasi') }}</textarea>
                            <label for="bimtek_inovasi_file"> Upload file pendukung (PDF):  <input type="file" name="bimtek_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="program_rkpd"><strong>Program dan kegiatan inovasi perangkat daerah dalam RKPD</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="program_rkpd" id="program_rkpd" class="form-control"
                            placeholder=" " 
                            autocomplete="off">{{ old('program_rkpd') }}</textarea>
                            <label for="program_rkpd_file"> Upload file pendukung (PDF):  <input type="file" name="program_rkpd_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="keterlibatan_aktor"><strong>Keterlibatan aktor inovasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="keterlibatan_aktor" id="keterlibatan_aktor" class="form-control"
                            placeholder=" " 
                            autocomplete="off">{{ old('keterlibatan_aktor') }}</textarea>
                            <label for="keterlibatan_aktor_file"> Upload file pendukung (PDF  ):  <input type="file" name="keterlibatan_aktor_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="pelaksana_inovasi"><strong>Pelaksana Inovasi Daerah</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="pelaksana_inovasi" id="pelaksana_inovasi" class="form-control"
                            placeholder=" " 
                            autocomplete="off">{{ old('pelaksana_inovasi') }}</textarea>
                            <label for="pelaksana_inovasi_file"> Upload file pendukung (PDF):  <input type="file" name="pelaksana_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="jejaring_inovasi"><strong>Jejaring Inovasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="jejaring_inovasi" id="jejaring_inovasi" class="form-control"
                            placeholder=" " 
                            autocomplete="off">{{ old('jejaring_inovasi') }}</textarea>
                            <label for="jejaring_inovasi_file"> Upload file pendukung (PDF):  <input type="file" name="jejaring_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="sosialisasi_inovasi"><strong>Sosialisasi Inovasi Daerah</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="sosialisasi_inovasi" id="sosialisasi_inovasi" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('sosialisasi_inovasi') }}</textarea>
                            <label for="sosialisasi_inovasi_file"> Upload file pendukung (PDF  ):  <input type="file" name="sosialisasi_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="pedoman_teknis"><strong>Pedoman Teknis</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="pedoman_teknis" id="pedoman_teknis" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('pedoman_teknis') }}</textarea>
                            <label for="pedoman_teknis_file"> Upload file pendukung (PDF):  <input type="file" name="pedoman_teknis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="kemudahan_informasi"><strong>Kemudahan Informasi Layanan</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="kemudahan_informasi" id="kemudahan_informasi" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('kemudahan_informasi') }}</textarea>
                            <label for="kemudahan_informasi_file"> Upload file pendukung (PDF):  <input type="file" name="kemudahan_informasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="kemudahan_proses"><strong>Kemudahan proses inovasi yg dihasilkan</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="kemudahan_proses" id="kemudahan_proses" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('kemudahan_proses') }}</textarea>
                            <label for="kemudahan_proses_file"> Upload file pendukung (PDF):  <input type="file" name="kemudahan_proses_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="penyelesaian_pengaduan"><strong>Penyelesaian layanan pengaduan</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="penyelesaian_pengaduan" id="penyelesaian_pengaduan" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('penyelesaian_pengaduan') }}</textarea>
                            <label for="penyelesaian_pengaduan_file"> Upload file pendukung (PDF):  <input type="file" name="penyelesaian_pengaduan_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="online_sistem"><strong>Online Sistem</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="online_sistem" id="description" class="form-control"
                            placeholder=" "
                            autocomplete="off">{{ old('online_sistem') }}</textarea>
                            <label for="online_sistem_file"> Upload file pendukung (PDF):  <input type="file" name="online_sistem_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="replikasi"><strong>Replikasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="replikasi" id="replikasi" class="form-control"
                            placeholder=" " 
                            autocomplete="off">{{ old('replikasi') }}</textarea>
                            <label for="replikasi_file"> Upload file pendukung (PDF):  <input type="file" name="replikasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="kecepatan_inovasi"><strong>Kecepatan Inovasi*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="kecepatan_inovasi" id="kecepatan_inovasi" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('kecepatan_inovasi') }}</textarea>
                            <label for="kecepatan_inovasi_file"> Upload file pendukung (PDF):  <input type="file" name="kecepatan_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="kemanfaatan_inovasi"><strong>Kemanfaatan Inovasi*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="kemanfaatan_inovasi" id="kemanfaatan_inovasi" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('kemanfaatan_inovasi') }}</textarea>
                            <label for="kemanfaatan_inovasi_file"> Upload file pendukung (PDF):  <input type="file" name="kemanfaatan_inovasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="monitoring_evaluasi"><strong>Monitoring dan evaluasi inovasi daerah*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="monitoring_evaluasi" id="monitoring_evaluasi" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('monitoring_evaluasi') }}</textarea>
                            <label for="monitoring_evaluasi_file"> Upload file pendukung (PDF):  <input type="file" name="monitoring_evaluasi_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="kualitas_inovasi"><strong>Kualitas Inovasi Daerah*</strong></label>
                        <div class="form-group">
                            <label for="kualitas_inovasi"> Upload Thumbnail Video:  <input type="file" name="kualitas_inovasi" class="form-control" required></label> <br>
                            <label for="kualitas_inovasi_file"> Upload Video max 8mb:  <input type="file" name="kualitas_inovasi_file" required class="form-control"></label> 
                        </div>
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
