@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pengaduan {{ $item->subject }}</h1>
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
            <form action="{{ route('complain-inbox.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
               <div class="form-group">
                <label for="is_improvement">Status</label>
                <br/>
                <input {{$item->is_improvement == "sudah" ? "checked" : ""}} 
                value="sudah" 
                type="radio" 
                id="sudah" 
                name="is_improvement">
                <label for="sudah">Sudah Ditindaklanjuti</label>
                <br>
                <input {{$item->is_improvement == "belum" ? "checked" : ""}} 
                value="belum" 
                type="radio" 
                
                id="belum" 
                name="is_improvement"> 
                <label for="belum">Belum Ditindaklanjuti</label>               
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