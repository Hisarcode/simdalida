@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Management Admin/Operator</h1>
        @if (Auth::user()->roles === 'SUPERADMIN')
        <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Admin
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
                            <th>Inisiator</th>
                            <th>Nama</th>
                            <th>Total Inovasi</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    {{-- test --}}
                    <tbody>
                        <?php
                        $i = 1;

                        ?>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td> @if ($item->inisiator->inisiator == 'Admin')
                                -
                            @else
                            {{ $item->inisiator->inisiator }}
                            @endif</td>
                            <td>{{ $item->name }}
                                <?php 
                                    $total = $proposal->where('users_id', $item->id)->count();
                                    ?>
                            </td>
                            <td> @if ($item->roles == 'ADMIN' || $item->roles == 'SUPERADMIN')
                                -
                            @else
                            <b>{{ $total }}</b>
                            @endif</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->roles }}</td>
                            <td>
                                @if ($item->roles == 'SUPERADMIN')
                                    .
                                @else
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('user.show', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif
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