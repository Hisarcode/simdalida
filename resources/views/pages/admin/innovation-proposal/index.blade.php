@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Inovasi Proposal</h1>
        @if (Auth::user()->roles === 'OPERATOR')
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                            <th>Status</th>
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
                            <td>{{ $proposal->name }} 
                                @if (Auth::user()->roles == 'SUPERADMIN' || Auth::user()->roles == 'ADMIN')
                                <hr> <b>Inovator:</b> {{ $proposal->user->name }}
                                 @endif
                            </td>
                            <td> @foreach (json_decode($proposal->innovation_step) as $step)
                                {{$step}} <br>
                            @endforeach
                            </td>  
                                <td>
                                @foreach (json_decode($proposal->innovation_initiator) as $initiator)
                                {{$initiator}} <br>
                            @endforeach
                                </td>    
                            <td>{{ $proposal->innovation_type }}</td>
                            <td>{{ $proposal->innovation_formats }}</td>
                            @if (Auth::user()->roles == 'SUPERADMIN' || Auth::user()->roles == 'ADMIN') 
                            <td>
                            @if ($proposal->status == 'BELUM')
                                <a href="actionedit/{{ $proposal->id }}" type="submit" onclick="return confirm('Yakin ingin menyetujui Proposal ini?');" class="btn btn-warning btn-sm">Belum ACC</a>
                            @else
                            <a href="actioneditt/{{ $proposal->id }}" type="submit" onclick="return confirm('Yakin ingin membatalkan ACC?');" class="btn btn-success btn-sm">Sudah ACC</a>
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
                                @if (Auth::user()->roles == 'SUPERADMIN')
                                <a href="{{ route('innovation-proposal.edit', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @if ($proposal->is_review == '1')
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info btn-warning" data-toggle="tooltip" title="Ada Review dari Admin">
                                    <i class="fa fa-eye">!</i>
                                </a>
                                @else
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @endif
                                <form action="{{ route('innovation-proposal.destroy', $proposal->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus? Jika proposal ini dihapus maka profil inovasi maupun laporan inovasi dari proposal ini juga akan terhapus !');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                                @if (Auth::user()->roles == 'ADMIN')
                                @if ($proposal->is_review == '1')
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info btn-warning" data-toggle="tooltip" title="Ada Review dari Admin">
                                    <i class="fa fa-eye">!</i>
                                </a>
                                @else
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @endif
                                <form action="{{ route('innovation-proposal.destroy', $proposal->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus? Jika proposal ini dihapus maka profil inovasi maupun laporan inovasi dari proposal ini juga akan terhapus !');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form> 
                                @endif
                                @if (Auth::user()->roles == 'OPERATOR')
                                @if ($proposal->status == 'BELUM')
                                <a href="{{ route('innovation-proposal.edit', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @if ($proposal->is_review == '1')
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info btn-warning" data-toggle="tooltip" title="Ada Review dari Admin">
                                    <i class="fa fa-eye">!</i>
                                </a>
                                @else
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @endif
                                <form action="{{ route('innovation-proposal.destroy', $proposal->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @elseif ($proposal->status == 'SUDAH')
                                <a href="{{ route('innovation-proposal.show', $proposal->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @endif
                                @endif
                       
                            
                               
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">
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

@push('addon-script')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
@endpush