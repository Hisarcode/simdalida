@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Akun {{ $item->name }}</h1>
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
                    <th width="40%">Nama</th>
                    <td>{{ $item->name }}</td>
                </tr>
                <tr>
                    <th>Inisiator Inovasi</th>
                    <td>{{ $item->inisiator->inisiator }}
                    </td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $item->username }}
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $item->email }}
                    </td>
                </tr>
                <tr>
                    <th>NIK/NIP</th>
                    <td>{{ $item->nik }}
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $item->roles }}
                    </td>
                </tr>
            </table>
            
            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection