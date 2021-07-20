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
            <form action="{{ route('innovation-profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">

                <div class="form-group">
                    <p>*profil inovasi bersifat unik (tidak boleh ada 2 atau lebih profil inovasi yang memiliki nama sama)</p>
                    <label for="innovation_proposals_id">Nama Inovasi</label>
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
                    <label for="description">Deskripsi Profil Inovasi</label>
                    <input type="text" class="form-control" name="description" placeholder="Isikan deskripsi profile inovasi" value="{{ old('description') }}" required autocomplete="off">
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
