@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Carousel</h1>
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
            <form action="{{ route('carousel.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title Carousel</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Input title carousel"
                        value="{{ $item->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description Carousel</label>
                    <textarea type="text" name="description" id="description" class="form-control"
                        placeholder="Input deskripsi carousel"">{{ $item->description }}</textarea>
                </div>

                <label for=" carousel_image"> Upload Gambar Carousel: <i>(maks: 3MB|jpeg,png,jpg,svg)</i> </label> 
                @if($item->carousel_image)
                    <iframe src="{{  Storage::url($item->carousel_image)  }}"
                        frameBorder="0"
                        scrolling="auto"
                        height="100%"
                        width="100%"
                        class="my-3"
                    ></iframe>     
                @else 
                    Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="carousel_image" id="carousel_image" placeholder="Gambar Carousel" >
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>
            </form>
        </div>
    </div>

</div>    
@endsection