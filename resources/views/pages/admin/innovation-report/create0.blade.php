@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Laporan Inovasi Daerah</h1>
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
            <form action="{{ route('innovation-report.store0') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="innovation_proposals_id"><b>Nama Inovasi</b></label>
                    <select name="innovation_proposals_id" required class="form-control">
                        <option value="">Pilih Nama Inovasi</option>
                        @foreach ($innovation as $proposal)
                        <option value="{{ $proposal->id }}">
                            {{ $proposal->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

               

            
                <button type="submit" class="btn btn-primary btn-block">
                    Lanjut
                </button>    
                


            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection



