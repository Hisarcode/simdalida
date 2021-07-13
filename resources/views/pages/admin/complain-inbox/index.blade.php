@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pengaduan</h1>    
    </div>


    <div class="card shadow mb-4"> 
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success alert-dismissable">
                    {{session('status')}}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Subject Aduan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($complains as $complain)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $complain->name }}</td>
                            <td>{{ $complain->subject }}</td>
                            <td>
                                <a href="{{ route('complain-inbox.show', $complain->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>   
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection