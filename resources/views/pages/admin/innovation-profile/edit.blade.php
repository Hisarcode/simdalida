@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Inovasi {{ $item->innovation_proposal->name }}</h1>
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
            <form action="{{ route('innovation-profile.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="innovation_proposals_id">Nama Profil Inovasi</label>
                    <select name="innovation_proposals_id" required class="form-control">
                        <option value="{{ $item->innovation_proposals_id }}">Jangan Diubah</option>
                        @foreach ($innovation_proposals as $innovation_proposal)
                        <option value="{{ $innovation_proposal->id }}">
                            {{ $innovation_proposal->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Profil Inovasi</label>
                    <input type="text" class="form-control" name="description" placeholder="Deskripsi Profil Inovasi" value="{{ $item->description }}">
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