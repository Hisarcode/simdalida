@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Carousel</h1>
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
            <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title Carousel</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Input title carousel"
                        value="{{ old('title') }}" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="description">Description Carousel</label>
                    <textarea type="text" name="description" id="description" class="form-control"
                        placeholder="Input deskripsi carousel" required
                        autocomplete="off">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="carousel_image">Upload Gambar Carousel: </label>
                    <input class="form-control-file" type="file" name="carousel_image" id="carousel_image"
                        placeholder="Gambar Carousel">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>

</div>
@endsection