@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data user {{ $item->name }}</h1>
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
            <form action="{{ route('user.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $item->username }}">
                </div>
               <div class="form-group">
                <label for="roles">Status</label>
                <br/>
                <input {{$item->roles == "ADMIN" ? "checked" : ""}} 
                value="ADMIN" 
                type="radio" 
                class="form-control" 
                id="admin" 
                name="roles">
                <label for="admin">Admin</label>

                <input {{$item->roles == "USER" ? "checked" : ""}} 
                value="USER" 
                type="radio" 
                class="form-control"
                id="user" 
                name="roles"> 
                <label for="user">User</label>               
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