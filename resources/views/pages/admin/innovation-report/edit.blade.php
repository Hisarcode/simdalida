@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Inovasi {{ $item->name }}</h1>
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
            <form action="{{ route('innovation-report.update', $item->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="name">Nama Inovasi</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Inonasi"
                        value="{{ $item->name }}">

                    <label for="innovation_sk_file">Upload SK Bupati</label>
                    <br>
                    @if($item->innovation_sk_file)
                    <iframe src="{{  Storage::url($item->innovation_sk_file)  }}" frameBorder="0" scrolling="auto"
                        height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="innovation_sk_file" name="innovation_sk_file" type="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file SK Bupati</small>
                </div>

                <div class="form-group">
                    <label for="quartal">Triwulan</label>
                    <input type="text" class="form-control" name="quartal"
                        placeholder="Permasalahan pelaksanaan inovasi daerah" value="{{ $item->quartal }}" readonly>
                </div>

                <div class="form-group">
                    <label for="report_year">Tahun Laporan</label>
                    <input type="text" class="form-control" name="report_year"
                        placeholder="Permasalahan pelaksanaan inovasi daerah" value="{{ $item->report_year }}" readonly>
                </div>

                <div class="form-group">
                    <label><strong>Tahapan Inovasi :</strong></label><br>
                    <label for="Tahap Inisiatif"> <input type="checkbox"
                            {{in_array("Tahap Inisiatif", json_decode($item->innovation_step)) ? "checked" : ""}}
                            name="innovation_step[]" {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                            id="Tahap Inisiatif" value="Tahap Inisiatif"> Tahap Inisiatif</label>

                    <label for="Tahap Uji Coba"> <input type="checkbox"
                            {{in_array("Tahap Uji Coba", json_decode($item->innovation_step)) ? "checked" : ""}}
                            name="innovation_step[]" {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                            id="Tahap Uji Coba" value="Tahap Uji Coba"> Tahap Uji Coba</label>

                    <label for="Tahap Penerapan"> <input type="checkbox"
                            {{in_array("Tahap Penerapan", json_decode($item->innovation_step)) ? "checked" : ""}}
                            name="innovation_step[]" {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                            id="Tahap Penerapan" value="Tahap Penerapan"> Tahap Penerapan</label>

                    <div class="invalid-feedback">
                        {{$errors->first('innovation_step')}}
                    </div>

                </div>

                <div class="form-group">
                    <label><strong>Inisiator Inovasi :</strong></label><br>

                    <label for="Kepala Daerah"> <input type="checkbox"
                            {{in_array("Kepala Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Kepala Daerah"
                            value="Kepala Daerah"> Kepala Daerah</label>

                    <label for="Anggota DPRD"> <input type="checkbox"
                            {{in_array("Anggota DPRD", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Anggota DPRD"
                            value="Anggota DPRD"> Anggota DPRD</label>

                    <label for="ASN"> <input type="checkbox"
                            {{in_array("ASN", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="ASN" value="ASN">
                        ASN</label>

                    <label for="Perangkat Daerah"> <input type="checkbox"
                            {{in_array("Perangkat Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Perangkat Daerah"
                            value="Perangkat Daerah"> Perangkat Daerah</label>

                    <label for="Anggota Masyarakat"> <input type="checkbox"
                            {{in_array("Anggota Masyarakat", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Anggota Masyarakat"
                            value="Anggota Masyarakat"> Anggota Masyarakat</label>

                    <div class="invalid-feedback">
                        {{$errors->first('innovation_initiator')}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="innovation_type">Jenis Inovasi Daerah</label>
                    <br>
                    <label>
                        <input {{$item->innovation_type == "digital" ? "checked" : ""}} value="digital" type="radio"
                            id="innovation_type" name="innovation_type"> Digital
                    </label>
                    <label>
                        <input {{$item->innovation_type == "nonDigital" ? "checked" : ""}} value="nonDigital"
                            type="radio" id="innovation_type" name="innovation_type"> Non-Digital
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_formats">Bentuk Inovasi Daerah</label>
                    <br>
                    <label>
                        <input {{$item->innovation_formats == "kelolaPemerintah" ? "checked" : ""}}
                            value="kelolaPemerintah" type="radio" id="innovation_formats" name="innovation_formats">
                        Inovasi Tata Kelola Pemerintah Daerah
                    </label>
                    <label>
                        <input {{$item->innovation_formats == "pelayananPublik" ? "checked" : ""}}
                            value="pelayananPublik" type="radio" id="innovation_formats" name="innovation_formats">
                        Inovasi Pelayanan Publik
                    </label>
                    <label>
                        <input {{$item->innovation_formats == "bentukLainnya" ? "checked" : ""}} value="bentukLainnya"
                            type="radio" id="innovation_formats" name="innovation_formats"> Inovasi Bentuk Lainnya
                        sesuai bidang urusan pemerintah daerah
                    </label>
                </div>

                <div class="form-group">
                    <label for="time_innovation_implement">Waktu Pelaksanaan Inovasi Daerah</label>
                    <input type="date" class="form-control" name="time_innovation_implement" placeholder=""
                        value="{{ $item->time_innovation_implement }}">
                </div>

                <div class="form-group">
                    <label for="problem">Permasalahan/kendala yang dihadapi dalam pelaksanaan inovasi daerah</label>
                    <input type="text" class="form-control" name="problem"
                        placeholder="Permasalahan pelaksanaan inovasi daerah" value="{{ $item->problem }}">
                </div>

                <div class="form-group">
                    <label for="solution">Solusi yang dilakukan terhadap permasalahan/kendala</label>
                    <input type="text" class="form-control" name="solution" placeholder="Solusi terhadap permasalahan"
                        value="{{ $item->solution }}">
                </div>

                <div class="form-group">
                    <label for="improvement">Tindaklanjut terhadap permasalahan/kendala sebelumnya</label>
                    <input type="text" class="form-control" name="improvement" placeholder=""
                        value="{{ $item->improvement }}">
                </div>

                <div class="form-group">
                    <label for="complain_innovation_total">Jumlah pengaduan/saran terkait inovasi</label>
                    <input type="text" class="form-control" name="complain_innovation_total" placeholder=""
                        value="{{ $item->complain_innovation_total }}">
                    <label for="complain_innovation_file">Upload Dokumen rekapitulasi pengaduan</label>
                    <br>
                    @if($item->complain_innovation_file)
                    <iframe src="{{  Storage::url($item->complain_innovation_file)  }}" frameBorder="0" scrolling="auto"
                        height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="complain_innovation_file" name="complain_innovation_file" type="file"
                        class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="complain_improvement_total">Jumlah pengaduan/saran yang sudah ditindaklanjuti</label>
                    <input type="text" class="form-control" name="complain_improvement_total"
                        placeholder="Hasil Inovasi Daerah" value="{{ $item->complain_improvement_total }}">
                    <label for="complain_improvement_file">Upload dokumen penyelesaian pengaduan</label>
                    <br>
                    @if($item->complain_improvement_file)
                    <iframe src="{{  Storage::url($item->complain_improvement_file)  }}" frameBorder="0"
                        scrolling="auto" height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="complain_improvement_file" name="complain_improvement_file" type="file"
                        class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_level">Tingkat capaian tujuan inovasi daerah</label>
                    <input type="text" class="form-control" name="achievement_goal_level" placeholder=""
                        value="{{ $item->achievement_goal_level }}">
                    <label for="achievement_goal_level_file">Upload dokumen pendukung</label>
                    <br>
                    @if($item->achievement_goal_level_file)
                    <iframe src="{{  Storage::url($item->achievement_goal_level_file)  }}" frameBorder="0"
                        scrolling="auto" height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="achievement_goal_level_file" name="achievement_goal_level_file" type="file"
                        class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_problem">Kendala pencapaian tujuan inovasi daerah</label>
                    <input type="text" class="form-control" name="achievement_goal_problem" placeholder=""
                        value="{{ $item->achievement_goal_problem }}">
                </div>

                <div class="form-group">
                    <label for="benefit_level">Tingkat Kemanfaatan inovasi daerah</label>
                    <input type="text" class="form-control" name="benefit_level" placeholder=""
                        value="{{ $item->benefit_level }}">
                    <label for="benefit_level_file">Upload dokumen pendukung</label>
                    <br>
                    @if($item->benefit_level_file)
                    <iframe src="{{  Storage::url($item->benefit_level_file)  }}" frameBorder="0" scrolling="auto"
                        height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="benefit_level_file" name="benefit_level_file" type="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_result_level">Tingkat Capaian Hasil Inovasi Daerah</label>
                    <input type="text" class="form-control" name="achievement_result_level" placeholder=""
                        value="{{ $item->achievement_result_level }}">
                    <label for="achievement_result_level_file">Upload dokumen pendukung</label>
                    <br>
                    @if($item->achievement_result_level_file)
                    <iframe src="{{  Storage::url($item->achievement_result_level_file)  }}" frameBorder="0"
                        scrolling="auto" height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="achievement_result_level_file" name="achievement_result_level_file" type="file"
                        class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_result_problem">Kendala Pencapaian Hasil Inovasi Daerah</label>
                    <input type="text" class="form-control" name="achievement_result_problem" placeholder=""
                        value="{{ $item->achievement_result_problem }}">
                </div>

                <div class="form-group">
                    <label for="innovation_strategy">Strategi Pelaksanaan Inovasi</label>
                    <input type="text" class="form-control" name="innovation_strategy" placeholder=""
                        value="{{ $item->innovation_strategy }}">
                </div>

                <div class="form-group">
                    <label for="video_innovation">Video inovasi daerah</label>
                    <br>
                    @if($item->video_innovation)
                    <iframe src="{{  Storage::url($item->video_innovation)  }}" frameBorder="0" scrolling="auto"
                        height="100%" width="100%"></iframe>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="video_innovation" name="video_innovation" type="file" class="form-control"
                        class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah video inovasi</small>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection