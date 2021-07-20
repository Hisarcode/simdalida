@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Proposal {{ $item->name }}</h1>
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
                    <th>Nama Pengirim</th>
                    <td>{{ $item->name }}</td>
                </tr>
                <tr>
                    <th>Tujuan Pengaduan Inovasi</th>
                    <td>{{ $item->innovation_complain->name }}</td>
                </tr>
                <tr>
                    <th>Subject Aduan</th>
                    <td>{{ $item->subject }}</td>
                </tr> 
                <tr>
                    <th>Deskripsi Aduan</th>
                    <td>{{ $item->description }}</td>
                </tr>   
            </table>

            <a href="{{ route('complain-inbox.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
