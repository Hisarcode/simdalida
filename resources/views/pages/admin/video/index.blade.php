@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Video</h1>
    </div>




    @if (!empty($about->id))
    <a href="{{ route('video.edit', $about->id) }}" class="btn btn-sm btn-primary shadow-sm my-3">
        <i class="fas fa-pencil fa-sm text-white-50"></i> Edit Video
    </a>
    @endif

    <div class="card shadow">
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


            <table class="table table-bordered">
                @if (!empty($about->id))
                <tr>
                    <th>Thumbnail</th>
                    <td>
                        <img src="{{ Storage::url($about->thumbnail)  }}" width="200px" class="img-fluid"
                        alt="thumbnail video">
                    </td>
                </tr>
                <tr>
                    <th>Video Home</th>
                    <td><a href="{{ $about->video }}"  target="_blank" type="button" class="btn btn-success col-xs-5 row-md-5 px-2 col-lg-10 col-lg-offset-1 my-2 text-center">
                        <span  class="fas fa-video mr-3"></span>Lihat Video</a></td>
                </tr>
               
                @else
                <tr>
                    <td colspan="1" class="text-center">
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