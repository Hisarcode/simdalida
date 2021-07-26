@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Profil Inovasi</b></h1>
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
        <div class="card-header">
            <h6><b>{{ $item->innovation_proposal->name }}</b></h6>
        </div>
        <div class="card-body">
            <form action="{{ route('innovation-profile.update', $item->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="users_id" value="{{Auth::user()->id}}">

                <div class="form-group">
                    <label for="description"><strong>Deskripsi Profil Inovasi</strong></label>

                    <textarea type="text" name="description" id="description" class="form-control"
                        placeholder="Deskripsi Profil Inovasi">{{ $item->description }}</textarea>
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