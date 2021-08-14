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
                    <label for="innovation_proposals_id"><strong>Nama Inovasi</strong></label>
                    <select name="innovation_proposals_id" required class="form-control">
                        <option value="">Pilih Nama Inovasi Berdasarkan Proposal</option>
                        @foreach ($innovation_proposals as $proposal)
                        <option value="{{ $proposal->id }}">
                            {{ $proposal->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="image">Upload Gambar Inovasi: </label>
                    <input class="form-control-file" type="file" name="image" id="image"
                        placeholder="Gambar">
                </div> --}}

                <div class="form-group">
                    <label for="description"><strong>Regulasi Inovasi Daerah*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file SK (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Ketersediaan SDM terhadap inovasi daerah*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file SK (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Dukungan Anggaran</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file SK (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Penggunaan IT</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF  ):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Bimtek Inovasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Program dan kegiatan inovasi perangkat daerah dalam RKPD</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Keterlibatan aktor inovasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF  ):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Pelaksana Inovasi Daerah</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Jejaring Inovasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Sosialisasi Inovasi Daerah</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF  ):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Pedoman Teknis</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Kemudahan Informasi Layanan</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Kemudahan proses inovasi yg dihasilkan</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Penyelesaian layanan pengaduan</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Online Sistem</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Replikasi</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Kecepatan Inovasi*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Kemanfaatan Inovasi*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Monitoring dan evaluasi inovasi daerah*</strong></label>
                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control"
                            placeholder=" " required
                            autocomplete="off">{{ old('description') }}</textarea>
                            <label for="profil_bisnis_file"> Upload file pendukung (PDF):  <input type="file" name="profil_bisnis_file"></label> 
                        </div>
                </div>

                <div class="form-group">
                    <label for="description"><strong>Kualitas Inovasi Daerah*</strong></label>
                        <div class="form-group">
                            <label for="profil_bisnis_file"> Upload Video max 8mb:  <input type="file" name="profil_bisnis_file"></label> 
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

{{-- @push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endpush --}}