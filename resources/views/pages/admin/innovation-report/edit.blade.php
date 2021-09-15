@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit laporan Inovasi {{ $item->name }}, triwulan ke-{{ $item->quartal }}</h1>
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
                <div class="form-group">
                    <label for="name"><strong>Nama Inovasi</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Inonasi"
                        value="{{ $item->innovation_proposal->name }}" readonly>
                    <label for="innovation_sk_file"><strong>Upload SK Bupati</strong> <i>(maks: 5MB|PDF)</i> <br></label>
                    
                    @if($item->innovation_sk_file)
                    <a href="{{  Storage::url($item->innovation_sk_file)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    (Tidak ada file)
                    @endif
                    <br>
                    <input id="innovation_sk_file" name="innovation_sk_file" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="quartal"><strong>Laporan Triwulan Ke -</strong></label>
                    <input type="text" class="form-control" name="quartal"
                        placeholder="Permasalahan pelaksanaan inovasi daerah" value="{{ $item->quartal }}" readonly>
                </div>

                <div class="form-group">
                    <label for="report_year"><strong>Tahun Laporan</strong></label>
                    <input type="text" class="form-control" name="report_year"
                        placeholder="Permasalahan pelaksanaan inovasi daerah" value="{{ $item->report_year }}" readonly>
                </div>

                <div class="form-group">
                    <label><strong>Tahapan Inovasi* </strong></label><br>
                    <label for="Tahap Inisiatif"> <input type="radio"
                            {{in_array("Tahap Inisiatif", json_decode($item->innovation_step)) ? "checked" : ""}}
                            name="innovation_step[]" {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                            id="Tahap Inisiatif" value="Tahap Inisiatif" onclick="javascript: return false;"> Tahap Inisiatif</label>

                    <label for="Tahap Uji Coba"> <input type="radio"
                            {{in_array("Tahap Uji Coba", json_decode($item->innovation_step)) ? "checked" : ""}}
                            name="innovation_step[]" {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                            id="Tahap Uji Coba" value="Tahap Uji Coba" onclick="javascript: return false;""> Tahap Uji Coba</label>

                    <label for="Tahap Penerapan"> <input type="radio"
                            {{in_array("Tahap Penerapan", json_decode($item->innovation_step)) ? "checked" : ""}}
                            name="innovation_step[]" {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                            id="Tahap Penerapan" value="Tahap Penerapan" onclick="javascript: return false;"> Tahap Penerapan</label>

                    <div class="invalid-feedback">
                        {{$errors->first('innovation_step')}}
                    </div>
                    <br>
                    <label for="tahapan_sk_bupati"><strong>Upload SK Bupati untuk tahapan inovasi</strong> <i>(maks: 5MB|PDF)</i> <br></label>
                    
                    @if($item->tahapan_sk_bupati)
                    <a href="{{  Storage::url($item->tahapan_sk_bupati)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    (Tidak ada file)
                    @endif
                    <br>
                    <input id="tahapan_sk_bupati" name="tahapan_sk_bupati" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>

                </div>

                <div class="form-group">
                    <label><strong>Inisiator Inovasi* </strong></label><br>

                    <label for="Kepala Daerah"> <input type="radio"
                            {{in_array("Kepala Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Kepala Daerah"
                            value="Kepala Daerah" onclick="javascript: return false;"> Kepala Daerah</label>
                    <br>
                    <label for="Anggota DPRD"> <input type="radio"
                            {{in_array("Anggota DPRD", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Anggota DPRD"
                            value="Anggota DPRD" onclick="javascript: return false;"> Anggota DPRD</label>
                    <br>
                    <label for="ASN"> <input type="radio"
                            {{in_array("ASN", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="ASN" value="ASN" onclick="javascript: return false;">
                        ASN</label>
                    <br>
                    <label for="Perangkat Daerah"> <input type="radio"
                            {{in_array("Perangkat Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Perangkat Daerah"
                            value="Perangkat Daerah" onclick="javascript: return false;"> Perangkat Daerah</label>
                    <br>
                    <label for="Anggota Masyarakat"> <input type="radio"
                            {{in_array("Anggota Masyarakat", json_decode($item->innovation_initiator)) ? "checked" : ""}}
                            name="innovation_initiator[]"
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}" id="Anggota Masyarakat"
                            value="Anggota Masyarakat" onclick="javascript: return false;"> Anggota Masyarakat</label>

                    <div class="invalid-feedback">
                        {{$errors->first('innovation_initiator')}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="innovation_type"><strong>Jenis Inovasi Daerah*</strong></label>
                    <br>
                    <label>
                        <input {{$item->innovation_type == "Digital" ? "checked" : ""}} value="Digital" type="radio"
                            id="innovation_type" name="innovation_type" onclick="javascript: return false;"> Digital
                    </label>
                    <label>
                        <input {{$item->innovation_type == "non-Digital" ? "checked" : ""}} value="non-Digital"
                            type="radio" id="innovation_type" name="innovation_type" onclick="javascript: return false;"> Non-Digital
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_formats"><strong>Bentuk Inovasi Daerah*</strong></label>
                    <br>
                    <label>
                        <input {{$item->innovation_formats == "Kelola Pemerintah" ? "checked" : ""}}
                            value="Kelola Pemerintah" type="radio" id="innovation_formats" name="innovation_formats" onclick="javascript: return false;">
                        Inovasi Tata Kelola Pemerintah Daerah
                    </label>
                    <br>
                    <label>
                        <input {{$item->innovation_formats == "Pelayanan Publik" ? "checked" : ""}}
                            value="Pelayanan Publik" type="radio" id="innovation_formats" name="innovation_formats" onclick="javascript: return false;">
                        Inovasi Pelayanan Publik
                    </label>
                    <br>
                    <label>
                        <input {{$item->innovation_formats == "Bentuk Lainnya" ? "checked" : ""}} value="Bentuk Lainnya"
                            type="radio" id="innovation_formats" name="innovation_formats" onclick="javascript: return false;"> Inovasi Bentuk Lainnya
                        sesuai bidang urusan pemerintah daerah
                    </label>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="time_innovation_implement"><strong>Waktu Pelaksanaan Inovasi Daerah*</strong></label>
                    <input type="date" class="form-control" name="time_innovation_implement" 
                    value="{{ $item->time_innovation_implement }}">
                </div>
                </div>
              
                <div class="form-group">
                    <label for="problem"><strong>Permasalahan/kendala yang dihadapi dalam pelaksanaan inovasi
                            daerah*</strong></label>
                    <textarea type="text" name="problem" id="problem" class="form-control"
                      >{{ $item->problem }}</textarea>
                </div>

                <div class="form-group">
                    <label for="solution"><strong>Solusi yang dilakukan terhadap permasalahan/kendala*</strong></label>
                    <textarea type="text" name="solution" id="solution" class="form-control"
                      >{{ $item->solution }}</textarea>
                </div>

                <div class="form-group">
                    <label for="improvement"><strong>Tindaklanjut terhadap permasalahan/kendala
                            sebelumnya*</strong></label>
                    <textarea type="text" name="improvement" id="improvement" class="form-control"
                   >{{ $item->improvement }}</textarea>
                </div>

            
                    <div class="form-group">
                    <label for="complain_innovation_total"><strong>Jumlah pengaduan/saran terkait
                            inovasi*</strong></label>
                    <input type="number" class="form-control" name="complain_innovation_total" 
                        value="{{ $item->complain_innovation_total }}" min="0">
                    <label for="complain_innovation_file"><strong>Upload Dokumen rekapitulasi pengaduan</strong> <i>(maks: 5MB|PDF)</i> <br> </label>
                    <br>
                    @if($item->complain_innovation_file)
                    <a href="{{  Storage::url($item->complain_innovation_file)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="complain_innovation_file" name="complain_innovation_file" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>
                
                    <div class="form-group">
                    <label for="complain_improvement_total"><strong>Jumlah pengaduan/saran yang sudah
                            ditindaklanjuti*</strong></label>
                    <input type="number" class="form-control" name="complain_improvement_total"
                     value="{{ $item->complain_improvement_total }}" min="0">
                    <label for="complain_improvement_file"><strong>Upload dokumen penyelesaian pengaduan</strong> <i>(maks: 5MB|PDF)</i> <br> </label>
                    <br>
                    @if($item->complain_improvement_file)
                    <a href="{{  Storage::url($item->complain_improvement_file)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="complain_improvement_file" name="complain_improvement_file" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>
            

                <div class="form-group">
                    <label for="achievement_goal_level"><strong>Tingkat capaian tujuan inovasi daerah*</strong></label>
                    <input type="text" class="form-control" name="achievement_goal_level" 
                        value="{{ $item->achievement_goal_level }}">
                    <label for="achievement_goal_level_file"><strong>Upload dokumen pendukung</strong> <i>(maks: 5MB|PDF)</i> <br> </label>
                    <br>
                    @if($item->achievement_goal_level_file)
                    <a href="{{  Storage::url($item->achievement_goal_level_file)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="achievement_goal_level_file" name="achievement_goal_level_file" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_goal_problem"><strong>Kendala pencapaian tujuan inovasi
                            daerah*</strong></label>
                    <textarea type="text" name="achievement_goal_problem" id="achievement_goal_problem"
                        class="form-control">{{ $item->achievement_goal_problem }}</textarea>
                </div>

                <div class="form-group">
                    <label for="benefit_level"><strong>Tingkat Kemanfaatan inovasi daerah*</strong></label>
                    <input type="text" class="form-control" name="benefit_level"
                        value="{{ $item->benefit_level }}">
                    <label for="benefit_level_file"><strong>Upload dokumen pendukung</strong> <i>(maks: 5MB|PDF)</i> <br> </label>
                    <br>
                    @if($item->benefit_level_file)
                    <a href="{{  Storage::url($item->benefit_level_file)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="benefit_level_file" name="benefit_level_file" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_result_level"><strong>Tingkat Capaian Hasil Inovasi Daerah*</strong></label>
                    <input type="text" class="form-control" name="achievement_result_level"
                        value="{{ $item->achievement_result_level }}">
                    <label for="achievement_result_level_file"><strong>Upload dokumen pendukung</strong> <i>(maks: 5MB|PDF)</i> <br> </label>
                    <br>
                    @if($item->achievement_result_level_file)
                    <a href="{{  Storage::url($item->achievement_result_level_file)  }}" target="_blank"
                        class="btn btn-warning">Klik Disini untuk membuka file</a>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <br>
                    <input id="achievement_result_level_file" name="achievement_result_level_file" type="file"><br>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file</small>
                </div>

                <div class="form-group">
                    <label for="achievement_result_problem"><strong>Kendala Pencapaian Hasil Inovasi Daerah*</strong></label>
                    <textarea type="text" name="achievement_result_problem" id="achievement_result_problem"
                        class="form-control">{{ $item->achievement_result_problem }}</textarea>
                </div>

                <div class="form-group">
                    <label for="innovation_strategy"><strong>Strategi Pelaksanaan Inovasi*</strong></label>
                    <textarea type="text" name="innovation_strategy" id="innovation_strategy" class="form-control"
                        placeholder="">{{ $item->innovation_strategy }}</textarea>
                </div>

                <div class="form-group">
                    <label for="video_innovation"><strong>Video inovasi daerah (Link Youtube)*</strong></label>
                    <br>
                    @if($item->video_innovation)
                    <a href="{{ $item->video_innovation }}" target="_blank" class="btn btn-warning">Klik
                        Disini untuk membuka video</a>
                    <br>
                    @else
                    Tidak ada video
                    @endif
                    <br>
                    <input type="text" class="form-control" name="video_innovation" placeholder="Link Youtube Laporan Video" value="{{ $item->video_innovation }}">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah video</small>
                </div>

                <button class="btn btn-primary" name="save_action" value="KIRIM"
                    onclick="return confirm('Yakin ingin mengirim laporan? Silahkan Cek kelengkapan data yang wajib diisi. Jika sudah terkirim maka tidak dapat dirubah lagi !');">Kirim
                    Laporan</button>
                <button class="btn btn-secondary" name="save_action" value="DRAFT">Simpan sebagai Draft</button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')


@endpush