@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inovasi Proposal</h1>
        @if (Auth::user()->roles === 'ADMIN')
        <a href="{{ route('innovation-proposal.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Proposal Inovasi
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
                            <th>Status</th>
                            @endif
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($proposal as $proposal)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $proposal->name }}</td>
                            <td> @foreach (json_decode($proposal->innovation_step) as $step)
                                &middot; {{$step}} <br>
                            @endforeach
                            </td>  
                                <td>
                                @foreach (json_decode($proposal->innovation_initiator) as $initiator)
                                &middot; {{$initiator}} <br>
                            @endforeach
                                </td>    
                            <td>{{ $proposal->innovation_type }}</td>
                            <td>{{ $proposal->innovation_formats }}</td>
                            @if (Auth::user()->roles == 'SUPERADMIN') 
                            <td>{{ $proposal->user->username }} <br>
                            Status: @if ($proposal->status == 'BELUM')
                                <a href="actionedit/{{ $proposal->id }}"><input type="submit" name="status" value="Blm ACC" class="btn btn-warning btn-sm"></a>
                            @else
                            <a href="actioneditt/{{ $proposal->id }}"><input type="submit" name="status" value="Sudah ACC " class="btn btn-success btn-sm"></a>
                            @endif
                            </td>
                            @else
                            <td>@if ($proposal->status == 'BELUM')
                                <button class="btn btn-warning btn-sm">Belum ACC</button>
                            @else
                            <button class="btn btn-success btn-sm">Sudah ACC</button>

                            @endif</td>    
                            @endif
                            <td>
                               @if (Auth::user()->roles === 'ADMIN')
                               <a href="{{ route('innovation-proposal.edit', $proposal->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                               @endif
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('innovation-proposal.destroy', $proposal->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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