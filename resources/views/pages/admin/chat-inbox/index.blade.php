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
                            <th>Nama Pengirim</th>
                            <th>Subject Pesan</th>
                            <th>Waktu Masuk</th>
                            <td>Sudah Dibalas?</td>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($chats as $chat)
                        <tr>
                            <td>{{ $i++ }}</td>

                            <td>{{ $chat->name }}</td>
                            <td>{{ $chat->subject }}</td>
                            <td>{{ $chat->created_at }}</td>
                            <td>@if ($chat->reply)
                                <button class="btn btn-success btn-sm">Sudah Dibalas</button>
                            @else
                            <button class="btn btn-warning btn-sm">Belum dibalas</button>
                            @endif</td>

                            <td>

                                <a href="{{ route('chat-inbox.show', $chat->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ($chat->reply)
                                    
                                @else
                                <a href="{{ route('chat-inbox.edit', $chat->id) }}" class="btn btn-info">
                                    <i class="fa fa-paper-plane"></i>
                                </a>
                                @endif
                          

                               
                                <form action="{{ route('chat-inbox.destroy', $chat->id) }}" method="POST"
                                    class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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
                            <td colspan="5" class="text-center">
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