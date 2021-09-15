@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data About</h1>
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
            <form action="{{ route('about.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" class="form-control" name="phone" placeholder="Nomor Telepon"
                        value="{{ $item->phone }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email"
                        value="{{ $item->email }}">
                </div>
                <div class="form-group">
                    <label for="facebook">Akun Facebook</label>
                    <input type="text" class="form-control" name="facebook" placeholder="Akun Facebook"
                        value="{{ $item->facebook }}">
                </div>
                <div class="form-group">
                    <label for="instagram">Akun Instagram</label>
                    <input type="text" class="form-control" name="instagram" placeholder="Akun Instagram"
                        value="{{ $item->instagram }}">
                </div>

                <div class="form-group">
                    <label for="youtube">Akun Youtube</label>
                    <input type="text" class="form-control" name="youtube" placeholder="Akun Youtube"
                        value="{{ $item->youtube }}">
                </div>

                <div class="form-group">
                    <label for="whatsapp">Akun Whatsapp</label>
                    <input type="text" class="form-control" name="whatsapp" placeholder="Akun Whatsapp"
                        value="{{ $item->whatsapp }}">
                </div>

                <div class="form-group">
                    <label for="whatsapp">Konten About</label>
                    <textarea type="textarea" class="form-control" name="about_content"
                        placeholder="Konten About">{{ $item->about_content }}</textarea>
                    <small class="text-muted">Konten about wajib diisi</small>

                </div>
                <div class="form-group">

                    <label for="about_image">Upload Gambar About (maks 3MB|jpeg,png,jpg,svg)</label>
                    <br>
                    @if($item->about_image)
                    <img src="{{ Storage::url($item->about_image) }}" class="img-fluid mb-3" height="50%"
                        width="50%"></img>
                    <br>
                    @else
                    Tidak ada file
                    @endif


                    <div class="form-group">
                        <input type="file" class="form-control-file" name="about_image" id="about_image"
                            placeholder="Gambar Carousel">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>

                    </div>

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