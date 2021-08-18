@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1>
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
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name"><strong>Nama</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ old('name') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="username"><strong>Username</strong></label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="email"><strong>Email</strong></label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="password"><strong>Password</strong></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                </div>

                <div class="form-group">
                    <label for="password_confirmation"><strong>Confirm-Password</strong></label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                </div>
    
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
