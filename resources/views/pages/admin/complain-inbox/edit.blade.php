@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">penyelesaian Pengaduan {{ $item->subject }}</h1>
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
            <form action="{{ route('complain-inbox.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
               <div class="form-group">
                <label for="bukti_tl"><strong>Silahkan upload bukti penyelesaian pengaduan</strong></label> 
                <br>
                <input id="bukti_tl" name="bukti_tl" type="file" required><br>
               </div>

                <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Yakin dengan penyelesaian aduan?');">
                    Selesai
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection