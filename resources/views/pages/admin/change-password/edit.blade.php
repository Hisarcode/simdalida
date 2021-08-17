@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Password {{ $item->name }}</h1>
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
 

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('change-password.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name"><strong>Inovator</strong></label>
                    <input type="text" class="form-control" name="name"  value="{{ $item->name }}" readonly>
                </div>

                <div class="form-group">
                    <label for="initiator"><strong>Inisiator Inovasi</strong></label>
                    <input type="text" class="form-control" name=""  value="{{ $item->inisiator->inisiator }}" readonly>
                </div>

                <div class="form-group">
                    <label for="username"><strong>Username</strong></label>
                    <input type="text" class="form-control" name="username"  value="{{ $item->username }}" readonly>
                </div>
          
                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                    <label for="new-password"><strong>Password Sebelumnya</strong></label>

              
                <input id="current-password" type="password" class="form-control" name="current-password" required>

                        @if ($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                        @endif
                 
                </div>

                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                    <label for="new-password"><strong>Password Baru</strong></label>

          
                        <input id="new-password" type="password" class="form-control" name="new-password" required>

                        @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
               
                </div>

                <div class="form-group">
                    <label for="new-password-confirm"><strong>Confirm New Password</strong></label>

              
                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
           
                </div>


                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Password
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection