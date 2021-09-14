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
                    <th>Nama Inovasi yang diadukan</th>
                    @if($item->innovation_complain == null)
                   <td><i>Nama Inovasi telah dihapus</i></td>
                    @else
                    <td>{{ $item->innovation_complain->name }}</td>
                    @endif
                </tr>
                <tr>
                    <th>Nama Pengirim</th>
                    <td>{{ $item->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $item->email }}</td>
                </tr>
                <tr>
                    <th>Nomor Handphone</th>
                    <td>{{ $item->no_hp }}</td>
                </tr>
                <tr>
                    <th>Waktu pengaduan masuk</th>
                    <td>{{ \Carbon\Carbon::parse($item->created_at) }}</td>
                </tr>
                <tr>
                    <th>Waktu pengaduan diselesaikan</th>
                    <td>@if ($item->updated_at)
                        {{ \Carbon\Carbon::parse($item->updated_at) }}
                    @else
                        <i>Belum diselesaikan</i>
                    @endif</td>
                </tr>
                <tr>
                    <th>Subject Aduan</th>
                    <td>{{ $item->subject }}</td>
                </tr>
                <tr>
                    <th>Deskripsi Aduan</th>
                    <td>{{ $item->description }}</td>
                </tr>   
                @if ($item->bukti_tl)
                <tr>
                    <th>Bukti Penyelesaian Pengaduan</th>
                    <td><a href="{{  Storage::url($item->bukti_tl)  }}" target="_blank" class="btn btn-warning">Klik Disini untuk membuka file</a></td>
                </tr>
                @else
                @endif
           
            </table>

            <a href="{{ route('complain-inbox.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection