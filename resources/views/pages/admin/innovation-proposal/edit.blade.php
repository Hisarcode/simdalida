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
            <form action="{{ route('innovation-proposal.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="name">nama Inovasi</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Inonasi" value="{{ $item->name }}">
                </div>

                <div class="form-group">
                    <label><strong>Tahapan Inovasi :</strong></label><br>
                   
                    <label for="Tahap Inisiatif"> <input 
                        type="checkbox"
                        {{in_array("Tahap Inisiatif", json_decode($item->innovation_step)) ? "checked" : ""}} 
                        name="innovation_step[]" 
                        {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                        id="Tahap Inisiatif" 
                        value="Tahap Inisiatif"> Tahap Inisiatif</label>

                    <label for="Tahap Uji Coba">   <input 
                        type="checkbox"
                        {{in_array("Tahap Uji Coba", json_decode($item->innovation_step)) ? "checked" : ""}} 
                        name="innovation_step[]" 
                        {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                        id="Tahap Uji Coba" 
                        value="Tahap Uji Coba">  Tahap Uji Coba</label>

                    <label for="Tahap Penerapan"> <input 
                        type="checkbox"
                        {{in_array("Tahap Penerapan", json_decode($item->innovation_step)) ? "checked" : ""}} 
                        name="innovation_step[]" 
                        {{$errors->first('innovation_step') ? "is-invalid" : "" }}"
                        id="Tahap Penerapan" 
                        value="Tahap Penerapan">  Tahap Penerapan</label>

                    <div class="invalid-feedback">
                        {{$errors->first('innovation_step')}}
                    </div>

                </div>  

                <div class="form-group">
                    <label><strong>Inisiator Inovasi :</strong></label><br>
                   
                    <label for="Kepala Daerah"> <input 
                        type="checkbox"
                        {{in_array("Kepala Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}} 
                        name="innovation_initiator[]" 
                        {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}"
                        id="Kepala Daerah" 
                        value="Kepala Daerah"> Kepala Daerah</label>

                        <label for="Anggota DPRD"> <input 
                            type="checkbox"
                            {{in_array("Anggota DPRD", json_decode($item->innovation_initiator)) ? "checked" : ""}} 
                            name="innovation_initiator[]" 
                            {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}"
                            id="Anggota DPRD" 
                            value="Anggota DPRD"> Anggota DPRD</label>

                            <label for="ASN"> <input 
                                type="checkbox"
                                {{in_array("ASN", json_decode($item->innovation_initiator)) ? "checked" : ""}} 
                                name="innovation_initiator[]" 
                                {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}"
                                id="ASN" 
                                value="ASN"> ASN</label>

                                <label for="Perangkat Daerah"> <input 
                                    type="checkbox"
                                    {{in_array("Perangkat Daerah", json_decode($item->innovation_initiator)) ? "checked" : ""}} 
                                    name="innovation_initiator[]" 
                                    {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}"
                                    id="Perangkat Daerah" 
                                    value="Perangkat Daerah"> Perangkat Daerah</label>

                                    <label for="Anggota Masyarakat"> <input 
                                        type="checkbox"
                                        {{in_array("Anggota Masyarakat", json_decode($item->innovation_initiator)) ? "checked" : ""}} 
                                        name="innovation_initiator[]" 
                                        {{$errors->first('innovation_initiator') ? "is-invalid" : "" }}"
                                        id="Anggota Masyarakat" 
                                        value="Anggota Masyarakat"> Anggota Masyarakat</label>

                    <div class="invalid-feedback">
                        {{$errors->first('innovation_initiator')}}
                    </div>
                </div>  

                <div class="form-group">
                    <label for="innovation_type">Jenis Inovasi Daerah</label>
                    <br>
                    <label>
                        <input {{$item->innovation_type == "digital" ? "checked" : ""}} value="digital" type="radio" id="innovation_type" name="innovation_type"> Digital
                    </label>
                    <label>
                        <input {{$item->innovation_type == "nonDigital" ? "checked" : ""}} value="nonDigital" type="radio" id="innovation_type" name="innovation_type"> Non-Digital
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_formats">Bentuk Inovasi Daerah</label>
                    <br>
                    <label>
                        <input {{$item->innovation_formats == "kelolaPemerintah" ? "checked" : ""}} value="kelolaPemerintah" type="radio" id="innovation_formats" name="innovation_formats"> Inovasi Tata Kelola Pemerintah Daerah
                    </label>
                    <label>
                        <input {{$item->innovation_formats == "pelayananPublik" ? "checked" : ""}} value="pelayananPublik" type="radio" id="innovation_formats" name="innovation_formats"> Inovasi Pelayanan Publik
                    </label>
                    <label>
                        <input {{$item->innovation_formats == "bentukLainnya" ? "checked" : ""}} value="bentukLainnya" type="radio" id="innovation_formats" name="innovation_formats"> Inovasi Bentuk Lainnya sesuai bidang urusan pemerintah daerah
                    </label>
                </div>

                <div class="form-group">
                    <label for="is_covid">COVID 19 atau Non COVID 19</label>
                    <br>
                    <label>
                        <input {{$item->is_covid == "covid" ? "checked" : ""}} value="covid" type="radio" id="is_covid" name="is_covid"> Covid 19
                    </label>
                    <label>
                        <input {{$item->is_covid == "nonCovid" ? "checked" : ""}} value="nonCovid" type="radio" id="is_covid" name="is_covid"> Non-Covid 19
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_concern">Urusan Inovasi Daerah</label>
                    <br>
                    <textarea name="innovation_concern" id="innovation_concern" {{$errors->first('innovation_concern') ? "is-invalid" : ""}}">{{old('innovation_concern') ? old('innovation_concern') : $item->innovation_concern}}</textarea>
                    <div class="invalid-feedback">
                      {{$errors->first('innovation_concern')}}
                    </div>
                </div>

                <div class="form-group">
                    <label for="start_innovation_trial">Waktu Uji Coba Inovasi</label>
                    <input type="date" class="form-control" name="start_innovation_trial" placeholder="start_innovation_trial" value="{{ $item->start_innovation_trial }}"> sampai tanggal
                    <input type="date" class="form-control" name="end_innovation_trial" placeholder="end_innovation_trial" value="{{ $item->end_innovation_trial }}">
                </div>

                <div class="form-group">
                    <label for="time_innovation_implement">Waktu Inovasi Daerah Diterapkan</label>
                    <input type="date" class="form-control" name="time_innovation_implement" placeholder="time_innovation_implement" value="{{ $item->time_innovation_implement }}">
                </div>

                <div class="form-group">
                    <label for="innovation_design">Rancang Bangun Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_design" placeholder="Rancang Bangun Inovasi Daerah" value="{{ $item->innovation_design }}">
                </div>

                <div class="form-group">
                    <label for="innovation_goal">Tujuan Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_goal" placeholder="Tujuan Inovasi Daerah" value="{{ $item->innovation_goal }}">
                </div>

                <div class="form-group">
                    <label for="innovation_benefit">Manfaat Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_benefit" placeholder="Manfaat Inovasi Daerah" value="{{ $item->innovation_benefit }}">
                </div>

                <div class="form-group">
                    <label for="innovation_result">Hasil Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_result" placeholder="Hasil Inovasi Daerah" value="{{ $item->innovation_result }}">
                </div>

                <div class="form-group">
                    <label for="budget">Anggaran Inovasi Daerah, jika ada</label>
                    <input type="text" class="form-control" name="budget" placeholder="Hasil Inovasi Daerah" value="{{ $item->budget }}">
                </div>
              
                <div class="form-group">
                    <label for="budget_file">file anggaran</label>
                    <br>
                    @if($item->budget_file)
                        <iframe src="{{  Storage::url($item->budget_file)  }}"
                            frameBorder="0"
                            scrolling="auto"
                         height="100%"
                         width="100%"
                        ></iframe>
                      <br>
                    @else 
                      Tidak ada file
                    @endif
                    <br>
                    <input id="budget_file" name="budget_file" type="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file anggaran</small>
                </div>

                <div class="form-group">
                    <label for="profil_bisnis"> Lampiran Profil Bisnis, jika ada</label>
                    <input type="text" class="form-control" name="profil_bisnis" placeholder="Lampiran Profil Bisnis" value="{{ $item->profil_bisnis }}">
                </div>

                <div class="form-group">
                    <label for="profil_bisnis_file">Lampiran Profil Bisnis</label>
                    <br>
                    @if($item->profil_bisnis_file)
                    <iframe src="{{  Storage::url($item->profil_bisnis_file)  }}"
                        frameBorder="0"
                        scrolling="auto"
                     height="100%"
                     width="100%"
                    ></iframe>
                      <br>
                    @else 
                      Tidak ada file
                    @endif
                    <br>
                    <input id="profil_bisnis_file" name="profil_bisnis_file" type="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah lampiran profil bisnis</small>
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