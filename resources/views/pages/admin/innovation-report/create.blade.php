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
            <label for="innovation_proposals_id"><strong>Nama Inovasi</strong></label>
            <input type="text" class="form-control" name="innovation_proposals_id" value="{{ $innovation->name }}"
                readonly>
            <input type="hidden" name="innovation_proposals_id" value="{{ $innovation->id }}" readonly>
            <div class="form-group">
                <label for="innovation_sk_file"> <b>Upload SK Bupati (bukti pendukung):</b> <i>(maks: 5MB|PDF)</i> <br> <input type="file" name="innovation_sk_file"
                        placeholder="SK bupati"></label>
            </div>
        </div>

        <div class="form-group">
            <label for="quartal"><strong>Laporan Triwulan Ke -</strong></label>
            <input type="text" class="form-control" name="quartal" value="{{ $quartal_next }}" readonly>
        </div>


        <div class="form-group">
            <label><strong><b>Tahapan Inovasi* :</b></strong></label><br>
            <label><input type="radio" name="innovation_step[]" value="Tahap Inisiatif"    {{in_array("Tahap Inisiatif", json_decode($item->innovation_step)) ? "checked" : ""}}> Tahap
                Inisiatif</label>
            <label><input type="radio" name="innovation_step[]" value="Tahap Uji Coba"    {{in_array("Tahap Uji Coba", json_decode($item->innovation_step)) ? "checked" : ""}}> Tahap Uji
                Coba</label>
            <label><input type="radio" name="innovation_step[]" value="Tahap Penerapan"    {{in_array("Tahap Penerapan", json_decode($item->innovation_step)) ? "checked" : ""}}> Tahap
                Penerapan</label>
                <div class="form-group">
                    <label for="tahapan_sk_bupati"> <b>Upload SK Bupati (bukti pendukung untuk tahapan inovasi):</b> <i>(maks: 5MB|PDF)</i> <br> <input type="file" name="tahapan_sk_bupati"
                            placeholder="SK bupati"></label>
                </div>
        </div>

        <div class="form-group">
            <label><strong><b>Inisiator Inovasi Daerah* :</b></strong></label><br>
            <label><input type="radio" name="innovation_initiator[]" value="Kepala Daerah"  {{in_array("Kepala Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}}> Kepala
                Daerah</label>
            <label><input type="radio" name="innovation_initiator[]" value="Anggota DPRD" {{in_array("Anggota DPRD", json_decode($item->innovation_initiator)) ? "checked" : ""}}> Anggota
                DPRD</label>
            <label><input type="radio" name="innovation_initiator[]" value="ASN" {{in_array("ASN", json_decode($item->innovation_initiator)) ? "checked" : ""}}> ASN</label>
            <label><input type="radio" name="innovation_initiator[]" value="Perangkat Daerah" {{in_array("Perangkat Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}}> Perangkat
                Daerah</label>
            <label><input type="radio" name="innovation_initiator[]" value="Anggota Masyarakat" {{in_array("Anggota Masyarakat", json_decode($item->innovation_initiator)) ? "checked" : ""}}> Anggota
                Masyarakat</label>
        </div>

        <div class="form-group">
            <label for="innovation_type"><b>Jenis Inovasi Daerah*</b></label>
            <br>
            <label>
                <input type="radio" name="innovation_type" id="innovation_type" value="Digital" {{($item->innovation_type == "Digital")? "checked" : ""}}> Digital
            </label>
            <label>
                <input type="radio" name="innovation_type" id="innovation_type" value="non-Digital" {{($item->innovation_type == "non-Digital")? "checked" : ""}}>
                Non-Digital
            </label>
        </div>

        <div class="form-group">
            <label for="innovation_formats"><strong>Bentuk Inovasi Daerah*</strong></label>
            <br>
            <label>
                <input type="radio" name="innovation_formats" id="innovation_formats" value="Kelola Pemerintah" {{($item->innovation_formats == "Kelola Pemerintah")? "checked" : ""}}>
                Inovasi Tata Kelola Pemerintah Daerah
            </label>
            <br>
            <label>
                <input type="radio" name="innovation_formats" id="innovation_formats" value="Pelayanan Publik" {{($item->innovation_formats == "Pelayanan Publik") ? "checked" : ""}} >
                Inovasi Pelayanan Publik
            </label>
            <br>
            <label>
                <input type="radio" name="innovation_formats" id="innovation_formats" value="Bentuk Lainnya" {{($item->innovation_formats == "Bentuk Lainnya") ? "checked" : ""}}>
                Inovasi Bentuk Lainnya sesuai bidang urusan pemerintah daerah
            </label>
        </div>

        <div class="form-group">
            <label for="time_innovation_implement"><b>Waktu Inovasi Daerah Diterapkan*</b></label>
            <input type="date" class="form-control" name="time_innovation_implement" placeholder="time"
                value="{{ old('time_innovation_implement') }}">
        </div>

        <div class="form-group">
            <label for="problem"><b>Permasalahan/kendala yg dihadapi*</b></label>
            <textarea type="text" name="problem" id="problem" class="form-control"
               autocomplete="off">{{ old('problem') }}</textarea>
        </div>

        <div class="form-group">
            <label for="solution"><b>Solusi terhadap Permasalahan/kendala yg dihadapi*</b></label>
            <textarea type="text" name="solution" id="solution" class="form-control"
               
                autocomplete="off">{{ old('solution') }}</textarea>
        </div>

        <div class="form-group">
            <label for="improvement"><b>Tindaklanjut terhadap permasalahan*</b></label>
            <textarea type="text" name="improvement" id="improvement" class="form-control"
                autocomplete="off">{{ old('improvement') }}</textarea>
        </div>


        {{-- <div class="form-group">
            <label for="complain_innovation_total"><b>Jumlah pengaduan/saran terkait inovasi*</b></label>
            <input type="text" class="form-control" name="complain_innovation_total"
                value="{{ old('complain_innovation_total') }}" autocomplete="off" id="mySelect" onchange="myFunction()">

            <label for="complain_innovation_file" id="demo"> <b>Upload dokumen rekapitulasi pengaduan:* </b> <i>(maks: 5MB|PDF, docx)</i> <br> <input type="file"
                    name="complain_innovation_file"></label>
        </div> --}}

        <div class="form-group">
            <label for="complain_improvement_total"><b>Jumlah pengaduan/saran yg sudah
                    ditindaklanjuti*</b></label>
            <input type="text" class="form-control" name="complain_improvement_total"
                value="{{ old('complain_improvement_total') }}" autocomplete="off">

            <label for="complain_improvement_file"> <b>Upload dokumen penyelesaian pengaduan*:</b> <i>(maks: 5MB|PDF, docx)</i> <br> <input type="file"
                    name="complain_improvement_file" ></label>
        </div>

        <div class="form-group">
            <label for="achievement_goal_level"><b>Tingkat Capaian Tujuan Inovasi Daerah*</b></label>
            <input type="text" class="form-control" name="achievement_goal_level" value="{{ old('achievement_goal_level') }}"
                autocomplete="off">

            <label for="achievement_goal_level_file"> <b>Upload dokumen pendukung:</b> <i>(maks: 5MB|PDF, docx)</i> <br> <input type="file"
                    name="achievement_goal_level_file"></label>
        </div>

        <div class="form-group">
            <label for="achievement_goal_problem"><b>Kendala Pencapaian tujuan inovasi daerah*</b></label>
            <textarea type="text" name="achievement_goal_problem" id="achievement_goal_problem" class="form-control"
                autocomplete="off">{{ old('achievement_goal_problem') }}</textarea>
        </div>

        <div class="form-group">
            <label for="benefit_level"><b>Tingkat Kemanfaatan Inovasi Daerah*</b></label>
            <input type="text" class="form-control" name="benefit_level" 
                value="{{ old('benefit_level') }}" autocomplete="off">

            <label for="benefit_level_file"> <b>Upload dokumen pendukung:</b> <i>(maks: 5MB|PDF, docx)</i> <br> <input type="file"
                    name="benefit_level_file"></label>
        </div>

        <div class="form-group">
            <label for="achievement_result_level"><b>Tingkat Capaian Hasil Inovasi Daerah*</b></label>
            <input type="text" class="form-control" name="achievement_result_level" value="{{ old('achievement_result_level') }}" 
                autocomplete="off">

            <label for="achievement_result_level_file"> <b>Upload dokumen pendukung: <i>(maks: 5MB|PDF, docx)</i> <br> </b><input type="file"
                    name="achievement_result_level_file"></label>
        </div>

        <div class="form-group">
            <label for="achievement_result_problem"><b>Kendala Pencapaian hasil inovasi daerah*</b></label>
            <textarea type="text" name="achievement_result_problem" id="achievement_result_problem" class="form-control"
                autocomplete="off">{{ old('achievement_result_problem') }}</textarea>
        </div>

        <div class="form-group">
            <label for="innovation_strategy"><b>Strategi Pelaksanaan Inovasi*</b></label>
            <textarea type="text" name="innovation_strategy" id="innovation_strategy" class="form-control"
                autocomplete="off">{{ old('innovation_strategy') }}</textarea>
        </div>

        <div class="form-group">
            <label for="video_innovation"><b>Video Inovasi Daerah (Link Youtube)*</b></label>
            <input type="text" class="form-control" name="video_innovation" value="{{ old('video_innovation') }}" autocomplete="off">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="complain_innovation_total"><b>Jumlah pengaduan/saran terkait inovasi*</b></label>
                    <select class="form-control" id="advice" name="complain_innovation_total">
                        <option value="" disabled="disabled" selected="selected">..</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                      </select>
              
                      <div id="blank">
                        <label for="complain_innovation_file" id="demo"> <b>Upload dokumen rekapitulasi pengaduan:* </b> <i>(maks: 5MB|PDF, docx)</i> <br> <input type="file"
                            name="complain_innovation_file"></label>
                      </div>
    
           
            </div>
        </div>
      
    


        <button class="btn btn-primary" name="save_action" value="KIRIM"
            onclick="return confirm('Yakin ingin mengirim laporan? Silahkan Cek kelengkapan data yang wajib diisi. Jika sudah terkirim maka tidak dapat dirubah lagi !');">Kirim
            Laporan</button>
        <button class="btn btn-warning" name="save_action" value="DRAFT">Simpan sebagai Draft</button>



        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection


@push('addon-script')
<script>
    let quartal = $('#quartal'); 
    $(document).on('change', '#innovation_proposals_id', function() {
        console.log(this.value);
        let url = '/api/getlastquartal/' + this.value;
            $.getJSON(url, function(data) {
                nextquartal = data + 1;
            quartal.val(nextquartal);
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
  $('#advice').on('change.blank', function() {
    $("#blank").toggle($(this).val() != '0');
  }).trigger('change.blank');
});
</script>


@endpush