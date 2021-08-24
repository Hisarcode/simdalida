@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesan dari {{ $item->name }}</h1>
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
                    <th>Email</th>
                    <td>{{ $item->email }}</td>
                </tr>
                <tr>
                    <th>Waktu Pesan Masuk</th>
                    <td>{{ $item->created_at }}</td>
                </tr>
                <tr>
                    <th>Waktu Pesan Dibalas</th>
                    <td>@if ($item->reply)
                        {{ $item->updated_at }}
                    @else
                        <i>Pesan Belum dibalas</i>
                    @endif</td>
                </tr>
                <tr>
                    <th>Subject Pesan</th>
                    <td>{{ $item->subject }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Pesan</th>
                    <td>{{ $item->description }}</td>
                </tr>
             
            </table>
            <div class="form-group">
                <label for="reply"><strong>Balasan</strong></label>
                <textarea type="text" name="reply" id="reply" class="form-control" readonly>{{ $item->reply }}</textarea>
            </div>

            <a href="{{ route('chat-inbox.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection