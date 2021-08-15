@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Inovasi</h1>
        @if (Auth::user()->roles === 'OPERATOR')
        <a href="{{ route('innovation-profile.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah profile Inovasi
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
                            <th>Inovator</th>
                            <th>Nama Inovasi Daerah</th>
                            <th>Tahap Inovasi</th>
                            <th>Bentuk Inovasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($profile as $profile)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $profile->user->name }}</td>
                            <td>{{ $profile->innovation_proposal->name }}</td>
                            <td>@foreach (json_decode($profile->innovation_proposal->innovation_step) as $step)
                                {{$step}} 
                                @endforeach</td>
                            <td>{{ $profile->innovation_proposal->innovation_formats }}</td>
                            <td>
                                <a href="{{ route('innovation-profile.edit', $profile->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>    
                                <a href="{{ route('innovation-profile.show', $profile->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('innovation-profile.destroy', $profile->id) }}" method="POST"
                                    class="d-inline" onclick="return confirm('Yakin ingin menghapus? Berkas yg dihapus tidak dapat kembali lagi!');">
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
                            <td colspan="6" class="text-center">
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