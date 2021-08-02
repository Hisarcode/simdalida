@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Infografis</h1>
        .
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
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Bentuk Inovasi</th>
                            <th>Pemilik Inovasi</th>
                            <th>Tampilkan di Publik?</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($infographic as $profile)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $profile->name }}
                            </td>
                            <td> {{Str::limit($profile->description, 20)}}</td>
                            <td>
                                <img src="{{ Storage::url($profile->image) }}" alt="{{ $profile->name }}"
                                width="200px" class="img-thumbnail">
                            </td>
                            <td>{{ $profile->innovation_proposal->innovation_formats }}</td>
                            <td>{{ $profile->user->username }}</td>
                            <td>
                                @if ($profile->is_published == 'NO')
                                <a href="editinfographic/{{ $profile->id }}"><input type="submit" name="is_published" value="NO" class="btn btn-warning btn-sm"></a>
                            @else
                            <a href="editinfographicc/{{ $profile->id }}"><input type="submit" name="is_published" value="YES" class="btn btn-success btn-sm"></a>
                            @endif</td>
                            <td>
                                <a href="{{ route('infographic-content.show', $profile->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
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