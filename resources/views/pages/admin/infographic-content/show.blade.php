@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Profile Inovasi</h1>
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
        <div class="card-header">
            <h6 class="my-auto font-weight-bold">{{ $item->innovation_proposal->name }}</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Nama Inovasi</th>
                    <td>{{ $item->innovation_proposal->name }}</td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td><img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                        width="200px" class="img-thumbnail"></td>
                </tr>
                <tr>
                    <th>Deskripsi Inovasi</th>
                    <td>{!! $item->description !!}</td>
                </tr>
                <tr>
                    <th>Tahapan Inovasi</th>
                    <td>@foreach (json_decode($item->innovation_proposal->innovation_step) as $step)
                        &middot; {{$step}} <br>
                        @endforeach</td>
                </tr>
                <tr>
                    <th>Inisiator Inovasi</th>
                    <td> @foreach (json_decode($item->innovation_proposal->innovation_initiator) as $initiator)
                        &middot; {{$initiator}} <br>
                        @endforeach</td>
                </tr>
                <tr>
                    <th>Jenis Inovasi</th>
                    <td>{{ $item->innovation_proposal->innovation_type }}</td>
                </tr>
                <tr>
                    <th>Bentuk Inovasi</th>
                    <td>{{ $item->innovation_proposal->innovation_formats }}</td>
                </tr>
                <tr>
                    <th>Covid 19 atau Non Covid 19?</th>
                    <td>{{ $item->innovation_proposal->is_covid }}</td>
                </tr>
                <tr>
                    <th>Urusan Inovasi Daerah</th>
                    <td>{{ $item->innovation_proposal->innovation_concern }}</td>
                </tr>
                <tr>
                    <th>Waktu Inovasi Daerah Diterapkan</th>
                    <td>{{ \Carbon\Carbon::parse($item->innovation_proposal->time_innovation_implement)->format('d, M-Y') }}
                    </td>
                </tr>
                <tr>
                    <th>Rancang Bangun Inovasi Daerah <br> dan pokok perubahan yg akan dilakukan</th>
                    <td>{{ $item->innovation_proposal->innovation_design}}</td>
                </tr>
                <tr>
                    <th>Tujuan Inovasi Daerah</th>
                    <td>{{ $item->innovation_proposal->innovation_goal}}</td>
                </tr>
                <tr>
                    <th>Manfaat yang diperoleh</th>
                    <td>{{ $item->innovation_proposal->innovation_benefit}}</td>
                </tr>
                <tr>
                    <th>Hasil Inovasi</th>
                    <td>{{ $item->innovation_proposal->innovation_result}}</td>
                </tr>
            </table>
            <a href="{{ route('infographic-content.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection