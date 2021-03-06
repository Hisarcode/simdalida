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
                    <label for="name"><b>Nama</b></label>
                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $item->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="username"><b>Username</b></label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $item->username }}" readonly>
                </div>

                @if (Auth::user()->roles === 'SUPERADMIN')
                <div class="form-group">
                    <label for="roles"><b>Status</b></label>
                    <br/>
                    <input {{$item->roles == "ADMIN" ? "checked" : ""}} 
                    value="ADMIN" 
                    type="radio" 
                    
                    id="admin" 
                    name="roles">
                    <label for="admin">Admin</label>
                    <br>
                    <input {{$item->roles == "OPERATOR" ? "checked" : ""}} 
                    value="OPERATOR" 
                    type="radio" 
                    
                    id="operator" 
                    name="roles">
                    <label for="operator">Operator</label>
                    <br>
                    <input {{$item->roles == "USER" ? "checked" : ""}} 
                    value="USER" 
                    type="radio" 
                    
                    id="user" 
                    name="roles"> 
                    <label for="user">User Biasa/Non-Aktif</label>               
                   </div> 
                @elseif (Auth::user()->roles === 'ADMIN')
                <div class="form-group">
                    <label for="roles"><b>Status</b></label>
                    <br>
                    <input {{$item->roles == "OPERATOR" ? "checked" : ""}} 
                    value="OPERATOR" 
                    type="radio" 
                    
                    id="operator" 
                    name="roles">
                    <label for="operator">Operator</label>
                    <br>
                    <input {{$item->roles == "USER" ? "checked" : ""}} 
                    value="USER" 
                    type="radio" 
                    
                    id="user" 
                    name="roles"> 
                    <label for="user">User Biasa/Non-Aktif</label>               
                   </div> 
                @endif
          

                <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Yakin ingin megubah data?');">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection