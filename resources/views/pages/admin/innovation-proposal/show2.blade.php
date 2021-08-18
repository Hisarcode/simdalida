@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Proposal {{ $item->name }}</h1>
        @if (Auth::user()->roles === 'SUPERADMIN' || Auth::user()->roles === 'ADMIN')
        <a href="{{ route('review-proposal.show', $item->id) }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Buat Review
        </a>
        @endif
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
            <table class="table table-bordered">
                <th><strong>Indikator</strong></th>
                    <th><strong>Isian Operator</strong></th>
                    <th style="width: 400px"><strong>Komentar Admin</strong></th>
                <tr>
                    <th>Nama Inovasi</th>
                    <td>{{ $item->name }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Tahapan Inovasi</th>
                    <td>@foreach (json_decode($item->innovation_step) as $step)
                        {{$step}} <br>
                    @endforeach</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Inisiator Inovasi</th>
                    <td>  @foreach (json_decode($item->innovation_initiator) as $initiator)
                        {{$initiator}} <br>
                    @endforeach</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Jenis Inovasi</th>
                    <td>{{ $item->innovation_type }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Bentuk Inovasi</th>
                    <td>{{ $item->innovation_formats }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Covid 19 atau Non Covid 19?</th>
                    <td>{{ $item->is_covid }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Urusan Inovasi Daerah</th>
                    <td>{{ $item->innovation_concern }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Waktu Uji Coba Inovasi Daerah</th>
                    <td>{{ \Carbon\Carbon::parse($item->start_innovation_trial)->format('d, M-Y') }} hingga {{ \Carbon\Carbon::parse($item->end_innovation_trial)->format('d, M-Y') }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Waktu Inovasi Daerah Diterapkan</th>
                    <td>{{ \Carbon\Carbon::parse($item->time_innovation_implement)->format('d, M-Y') }}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Rancang Bangun Inovasi Daerah <br> dan pokok perubahan yg akan dilakukan</th>
                    <td>{{ $item->innovation_design}}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Tujuan Inovasi Daerah</th>
                    <td>{{ $item->innovation_goal}}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Manfaat yang diperoleh</th>
                    <td>{{ $item->innovation_benefit}}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Hasil Inovasi</th>
                    <td>{{ $item->innovation_result}}</td>
                    <td><i>Belum ada review</i></td>
                </tr>
                <tr>
                    <th>Anggaran</th>
                    <td>{{ $item->budget}} <br>
                        @if($item->budget_file)
                        <a href="{{  Storage::url($item->budget_file)  }}" target="_blank" class="btn btn-warning">Klik Disini untuk membuka file</a>
                      <br>
                    @else 
                      Tidak ada file
                    @endif</td>
                    <td><i>Belum ada review</i></td>
                    
                </tr>
                <tr>
                    <th>Profil Bisnis</th>
                    <td>{{ $item->profil_bisnis }} <br>
                        @if($item->profil_bisnis_file)
                        <a href="{{  Storage::url($item->profil_bisnis_file)  }}" target="_blank" class="btn btn-warning">Klik Disini untuk membuka file</a>
                          <br>
                        @else 
                          Tidak ada file
                        @endif</td>
                        <td><i>Belum ada review</i></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
