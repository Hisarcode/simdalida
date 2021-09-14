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
    <strong>*Indikator Wajib Diisi</strong>
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('innovation-proposal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">

                <div class="form-group">
                    <label for="name"><strong>Nama Inovasi Daerah*</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Inovasi" value="{{ old('name') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label><strong>Tahapan Inovasi* </strong></label><br>
                    <label><input type="radio" name="innovation_step[]" value="Tahap Inisiatif"> Tahap Inisiatif</label>
                    <label><input type="radio" name="innovation_step[]" value="Tahap Uji Coba"> Tahap Uji Coba</label>
                    <label><input type="radio" name="innovation_step[]" value="Tahap Penerapan"> Tahap Penerapan</label>
                </div>  

                <div class="form-group">
                    <label><strong>Inisiator Inovasi Daerah* </strong></label><br>
                    <label><input type="radio" name="innovation_initiator[]" value="Kepala Daerah"> Kepala Daerah</label>
                    <label><input type="radio" name="innovation_initiator[]" value="Anggota DPRD"> Anggota DPRD</label>
                    <label><input type="radio" name="innovation_initiator[]" value="ASN"> ASN</label>
                    <label><input type="radio" name="innovation_initiator[]" value="Perangkat Daerah"> Perangkat Daerah</label>
                    <label><input type="radio" name="innovation_initiator[]" value="Anggota Masyarakat"> Anggota Masyarakat</label>
                </div> 

                <div class="form-group">
                    <label for="innovation_type"><strong>Jenis Inovasi Daerah*</strong></label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_type" id="innovation_type" value="Digital" checked> Digital
                    </label>
                    <label>
                        <input type="radio" name="innovation_type" id="innovation_type" value="non-Digital" checked> Non-Digital
                    </label>
                </div>

                <div class="form-group">
                    <label for="innovation_formats"><strong>Bentuk Inovasi Daerah*</strong></label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="Kelola Pemerintah" checked> Inovasi Tata Kelola Pemerintah Daerah
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="Pelayanan Publik" checked> Inovasi Pelayanan Publik
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="innovation_formats" id="innovation_formats" value="Bentuk Lainnya" checked> Inovasi Bentuk Lainnya sesuai bidang urusan pemerintah daerah
                    </label>
                </div>

                <div class="form-group">
                    <label for="is_covid"><strong>COVID 19 atau Non COVID 19*</strong></label>
                    <br>
                    <label>
                        <input type="radio" name="is_covid" id="is_covid" value="covid" checked> Covid 19
                    </label>
                    <label>
                        <input type="radio" name="is_covid" id="is_covid" value="nonCovid" checked> Non Covid 19
                    </label>
                </div>
                
                <div class="form-group">
                    <label for="innovation_concern"><strong>Urusan Inovasi Daerah*</strong></label>
                    <textarea type="text" name="innovation_concern" id="innovation_concern" class="form-control" placeholder="Isikan urusan inovasi daerah" required
                    autocomplete="off">{{ old('innovation_concern') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="start_innovation_trial"><strong>Waktu Uji Coba Inovasi*</strong></label>
                    <input type="date" class="form-control" name="start_innovation_trial" placeholder="time" value="{{ old('start_innovation_trial') }}" required> sampai tanggal
                    <input type="date" class="form-control" name="end_innovation_trial" placeholder="time" value="{{ old('end_innovation_trial') }}" required> 
                </div>

                <div class="form-group">
                    <label for="time_innovation_implement"><strong>Waktu Inovasi Daerah Diterapkan*</strong></label>
                    <input type="date" class="form-control" name="time_innovation_implement" placeholder="time" value="{{ old('time_innovation_implement') }}" required>
                </div>

                <div class="form-group">
                    <label for="innovation_design"><strong>Rancang Bangun Inovasi Daerah*</strong> <i>min 300 kata</i></label>
                    <textarea type="text" name="innovation_design" id="innovation_design" class="form-control" placeholder="Isikan Rancang bangun inovasi daerah" required
                    autocomplete="off" minlength="300">{{ old('innovation_design') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="innovation_goal"><strong>Tujuan Inovasi Daerah*</strong></label>
                    <textarea type="text" name="innovation_goal" id="innovation_goal" class="form-control" placeholder="Isikan Tujuan inovasi daerah" required
                    autocomplete="off">{{ old('innovation_goal') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="innovation_benefit"><strong>Manfaat Inovasi Daerah*</strong></label>
                    <textarea type="text" name="innovation_benefit" id="innovation_benefit" class="form-control" placeholder="Isikan Manfaat inovasi daerah" required
                    autocomplete="off">{{ old('innovation_benefit') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="innovation_result"><strong>Hasil Inovasi*</strong></label>
                    <textarea type="text" name="innovation_result" id="innovation_result" class="form-control" placeholder="Isikan Hasil inovasi daerah" required
                    autocomplete="off">{{ old('innovation_result') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="budget"><strong>Isikan anggaran, jika diperlukan</strong> <i>(maks: 5MB|PDF)</i> <br></label>
                    <textarea type="text" name="budget" id="budget" class="form-control" placeholder="Isikan anggaran"
                    autocomplete="off">{{ old('budget') }}</textarea>

                    <label for="budget_file"> Upload Lampiran Anggaran:  <input type="file" name="budget_file"></label> 
                </div>

                <div class="form-group">
                    <label for="profil_bisnis"><strong>Isikan Profil Bisnis, jika ada</strong> <i>(maks: 5MB|PDF)</i> <br></label>
                    <textarea type="text" name="profil_bisnis" id="profil_bisnis" class="form-control" placeholder="Isikan Profil Bisnis"
                    autocomplete="off">{{ old('profil_bisnis') }}</textarea>

                    <label for="profil_bisnis_file"> Upload Lampiran Profil Bisnis:  <input type="file" name="profil_bisnis_file"></label> 
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
