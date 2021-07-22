@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Inovasi</h1>
        @if (Auth::user()->roles === 'ADMIN')
        <a href="{{ route('innovation-report.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Laporan Inovasi
        </a>
            @else
            .
            @endif
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
                            <th>Nama Inovasi</th>
                            <th>Tahapan Inovasi</th>
                            <th>Inisiator</th>
                            <th>Jenis</th>
                            <th>Bentuk Inovasi</th>
                            @if (Auth::user()->roles == 'SUPERADMIN')
                            <th>Pemilik Inovasi</th>
                            @else
                            <th>Waktu Pelaksanaan</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($report as $report)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $report->name }}</td>
                            <td> @foreach (json_decode($report->innovation_step) as $step)
                                &middot; {{$step}} <br>
                            @endforeach
                            </td>  
                                <td>
                                @foreach (json_decode($report->innovation_initiator) as $initiator)
                                &middot; {{$initiator}} <br>
                            @endforeach
                                </td>    
                            <td>{{ $report->innovation_type }}</td>
                            <td>{{ $report->innovation_formats }}</td>
                            @if (Auth::user()->roles == 'SUPERADMIN') 
                            <td>{{ $report->user->username }}</td>
                            @else
                            <td>{{ \Carbon\Carbon::parse($report->time_innovation_implement)->format('d M-Y') }}</td>    
                            @endif
                            <td>
                                @if (Auth::user()->roles === 'ADMIN')
                                <a href="{{ route('innovation-report.edit', $report->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endif
                                <a href="{{ route('innovation-report.show', $report->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('innovation-report.destroy', $report->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
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