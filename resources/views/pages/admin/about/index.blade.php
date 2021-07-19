@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen About Halaman Utama</h1>
    </div>




    @if (!empty($about->id))
    <a href="{{ route('about.edit', $about->id) }}" class="btn btn-sm btn-primary shadow-sm my-3">
        <i class="fas fa-pencil fa-sm text-white-50"></i> Edit About
    </a>
    @endif

    <div class="card shadow">
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success alert-dismissable">
                {{session('status')}}
            </div>
            @endif


            <table class="table table-bordered">
                @if (!empty($about->id))
                <tr>
                    <th>Nomor Handphone</th>
                    <td>{{ $about->phone }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $about->email }}</td>
                </tr>
                <tr>
                    <th>Whatsapp</th>
                    <td>{{ $about->whatsapp }}</td>
                </tr>
                <tr>
                    <th>Facebook</th>
                    <td>{{ $about->facebook }}</td>
                </tr>
                <tr>
                    <th>Instagram</th>
                    <td>{{ $about->instagram }}</td>
                </tr>
                <tr>
                    <th>Youtube Channel</th>
                    <td>{{ $about->youtube }}</td>
                </tr>
                <tr>
                    <th>Deskripsi About</th>
                    <td>@if (!empty($about->about_content))
                        {{ $about->about_content }}
                        @else
                        Tidak ada deskripsi about
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Gambar About</th>
                    <td>
                        @if (!empty($about->about_image))
                        <img src="{{ Storage::url($about->about_image)  }}" width="200px" class="img-fluid"
                            alt="Gambar About">
                        @else
                        Tidak ada gambar about
                        @endif
                    </td>
                </tr>
                @else
                <tr>
                    <td colspan="5" class="text-center">
                        Data Kosong
                    </td>
                </tr>
                @endif
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@endsection