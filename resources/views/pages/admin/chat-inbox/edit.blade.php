@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kirim Pesan Kepada {{ $item->name }}</h1>
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
            <form action="{{ route('chat-inbox.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Pengirim</th>
                        <td>{{ $item->name }}</td>
                        <input type="hidden" name="name" value="{{ $item->name }}">
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                        <input type="hidden" name="email" value="{{ $item->email }}">
                    </tr>
                    <tr>
                        <th>Waktu Masuk</th>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Subject Pesan</th>
                        <td>{{ $item->subject }}</td>
                        <input type="hidden" name="subject" value="{{ $item->subject }}">
                    </tr>
                    <tr>
                        <th>Deskripsi Pesan</th>
                        <td>{{ $item->description }}</td>
                        <input type="hidden" name="description" value="{{ $item->description }}">
                    </tr>
                </table>
                <div class="form-group">
                    <label for="reply"><strong>Balasan</strong></label>
                    <textarea type="text" name="reply" id="reply" class="form-control">{{ $item->reply }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                     Kirim Pesan
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection