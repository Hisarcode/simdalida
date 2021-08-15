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
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('changePassword') }}" method="POST">
                @method('PUT')
                @csrf
               <div class="form-group">
                <label for="current-password">Current-Password</label>
                    <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Current-Password">
                    @if ($errors->has('current-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('current-password') }}</strong>
                    </span>
                    @endif
               </div>
               <div class="form-group">
                    <label for="new-password">Password</label>
                    <input type="password" class="form-control" id="new-password" name="new-password" placeholder="New-Password">
                    @if ($errors->has('new-password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('new-password') }}</strong>
                    </span>
                    @endif
               </div>
               <div class="form-group">
                    <label for="new-password-confirm">Password Confirmation</label>
                    <input type="password" class="form-control" id="new-password-confirm" name="new-password-confirm" placeholder="new-password-confirm">
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