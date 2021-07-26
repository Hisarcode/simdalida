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
                    <p>*<b>profil inovasi bersifat unik</b> (setiap 1 proposal hanya boleh memiliki 1 profil saja, tidak
                        boleh lebih. atau akan muncul error)</p>
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

                <div class="form-group">
                    <label for="description"><strong>Deskripsi Profil Inovasi</strong></label>
                    <textarea type="text" name="description" id="description" class="form-control"
                        placeholder="Isikan deskripsi inovasi daerah" required
                        autocomplete="off">{{ old('description') }}</textarea>
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