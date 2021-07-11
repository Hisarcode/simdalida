@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Inovasi Daerah</h1>
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
            <form action="{{ route('innovation-proposal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">

                <div class="form-group">
                    <label for="name">Nama Inovasi Daerah</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Inovasi" value="{{ old('name') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label><strong>Tahapan Inovasi :</strong></label><br>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Inisiatif"> Tahap Inisiatif</label>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Uji Coba"> Tahap Uji Coba</label>
                    <label><input type="checkbox" name="innovation_step[]" value="Tahap Penerapan"> Tahap Penerapan</label>
                </div>  

                <div class="form-group">
                    <label><strong>Inisiator Inovasi Daerah:</strong></label><br>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Kepala Daerah"> Kepala Daerah</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Anggota DPRD"> Anggota DPRD</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="ASN"> ASN</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Perangkat Daerah"> Perangkat Daerah</label>
                    <label><input type="checkbox" name="innovation_initiator[]" value="Anggota Masyarakat"> Anggota Masyarakat</label>
                </div> 

                <div class="form-group">
                    <label for="innovation_type">Jenis Inovasi Daerah</label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_type" id="innovation_type" value="digital" checked> Digital
                    </label>
                    <label>
                        <input type="radio" name="innovation_type" id="innovation_type" value="nonDigital" checked> Non-Digital
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_formats">Bentuk Inovasi Daerah</label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="kelolaPemerintah" checked> Inovasi Tata Kelola Pemerintah Daerah
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="pelayananPublik" checked> Inovasi Pelayanan Publik
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="bentukLainnya" checked> Inovasi Bentuk Lainnya sesuai bidang urusan pemerintah daerah
                    </label>
                </div>

                <div class="form-group">
                    <label for="is_covid">COVID 19 atau Non COVID 19</label>
                    <br>
                    <label>
                        <input type="radio" name="is_covid" id="is_covid" value="covid" checked> Covid 19
                    </label>
                    <label>
                        <input type="radio" name="is_covid" id="is_covid" value="nonCovid" checked> Non Covid 19
                    </label>
                </div>
                
                <div class="form-group">
                    <label for="innovation_concern">Urusan Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_concern" placeholder="Isikan urusan inovasi daerah" value="{{ old('innovation_concern') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="start_innovation_trial">Waktu Uji Coba Inovasi</label>
                    <input type="date" class="form-control" name="start_innovation_trial" placeholder="time" value="{{ old('start_innovation_trial') }}"> sampai tanggal
                    <input type="date" class="form-control" name="end_innovation_trial" placeholder="time" value="{{ old('end_innovation_trial') }}"> 
                </div>

                <div class="form-group">
                    <label for="time_innovation_implement">Waktu Inovasi Daerah Diterapkan</label>
                    <input type="date" class="form-control" name="time_innovation_implement" placeholder="time" value="{{ old('time_innovation_implement') }}">
                </div>

                <div class="form-group">
                    <label for="innovation_design">Rancang Bangun Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_design" placeholder="Isikan Rancang bangun inovasi daerah" value="{{ old('innovation_design') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="innovation_goal">Tujuan Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_goal" placeholder="Isikan tujuan inovasi daerah" value="{{ old('innovation_goal') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="innovation_benefit">Manfaat Inovasi Daerah</label>
                    <input type="text" class="form-control" name="innovation_benefit" placeholder="Isikan manfaat inovasi daerah" value="{{ old('innovation_benefit') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="innovation_result">Hasil Inovasi</label>
                    <input type="text" class="form-control" name="innovation_result" placeholder="Isikan hasil inovasi daerah" value="{{ old('innovation_result') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="budget">Isikan anggaran, jika diperlukan</label>
                    <input type="text" class="form-control" name="budget" placeholder="Isikan anggaran" value="{{ old('budget') }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="budget_file">Lampiran Anggaran</label>
                    <input type="file" class="form-control" name="budget_file" placeholder="lampiran anggaran" class="form-control">
                </div>

                <div class="form-group">
                    <label for="profil_bisnis">Isikan Profil Bisnis, jika ada</label>
                    <input type="text" class="form-control" name="profil_bisnis" placeholder="Isikan Profil Bisnis" value="{{ old('profil_bisnis') }}" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="profil_bisnis_file">Lampiran Profil bisnis</label>
                    <input type="file" class="form-control" name="profil_bisnis_file" placeholder="lampiran profil bisnis" class="form-control">
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
