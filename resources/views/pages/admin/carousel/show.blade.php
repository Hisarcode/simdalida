@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Carousel</h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>Title Carousel</th>
                    <td>{{ $item->title }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Carousel</th>
                    <td>
                        <p>{{ $item->description }}</p>
                    </td>
                </tr>
                <tr>
                    <th>Gambar Carousel</th>
                    <td>
                        @if($item->carousel_image)
                        <img src="{{  Storage::url($item->carousel_image)  }}" class="img-fluid" height="100px"
                            width="80%" class="my-3"></img>
                        @else
                        Tidak ada file
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection