@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Video</h1>
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
            <form action="{{ route('video.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">

                    <label for="thumbnail">Upload Thumbnail Video</label>
                    <br>
                    @if($item->thumbnail)
                    <img src="{{ Storage::url($item->thumbnail) }}" class="img-fluid mb-3" height="40%"></img>
                    <br>
                    @else
                    Tidak ada file
                    @endif
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="thumbnail" id="thumbnail">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>

                    </div>

                </div>
                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" name="video"
                        value="{{ $item->video }}">
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