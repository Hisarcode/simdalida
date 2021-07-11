@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Proposal {{ $item->name }}</h1>
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
                <tr>
                    <th>Nama Inovasi</th>
                    <td>{{ $item->name }}</td>
                </tr>
                <tr>
                    <th>Tahapan Inovasi</th>
                    <td>@foreach (json_decode($item->innovation_step) as $step)
                        &middot; {{$step}} <br>
                    @endforeach</td>
                </tr>
                <tr>
                    <th>Inisiator Inovasi</th>
                    <td>  @foreach (json_decode($item->innovation_initiator) as $initiator)
                        &middot; {{$initiator}} <br>
                    @endforeach</td>
                </tr>
                <tr>
                    <th>Jenis Inovasi</th>
                    <td>{{ $item->innovation_type }}</td>
                </tr>
                <tr>
                    <th>Bentuk Inovasi</th>
                    <td>{{ $item->innovation_formats }}</td>
                </tr>
                <tr>
                    <th>Covid 19 atau Non Covid 19?</th>
                    <td>{{ $item->is_covid }}</td>
                </tr>
                <tr>
                    <th>Urusan Inovasi Daerah</th>
                    <td>{{ $item->innovation_concern }}</td>
                </tr>
                <tr>
                    <th>Waktu Uji Coba Inovasi Daerah</th>
                    <td>{{ \Carbon\Carbon::parse($item->start_innovation_trial)->format('d, M-Y') }} hingga {{ \Carbon\Carbon::parse($item->end_innovation_trial)->format('d, M-Y') }}</td>
                </tr>
                <tr>
                    <th>Waktu Inovasi Daerah Diterapkan</th>
                    <td>{{ \Carbon\Carbon::parse($item->time_innovation_implement)->format('d, M-Y') }}</td>
                </tr>
                <tr>
                    <th>Rancang Bangun Inovasi Daerah <br> dan pokok perubahan yg akan dilakukan</th>
                    <td>{{ $item->innovation_design}}</td>
                </tr>
                <tr>
                    <th>Tujuan Inovasi Daerah</th>
                    <td>{{ $item->innovation_goal}}</td>
                </tr>
                <tr>
                    <th>Manfaat yang diperoleh</th>
                    <td>{{ $item->innovation_benefit}}</td>
                </tr>
                <tr>
                    <th>Hasil Inovasi</th>
                    <td>{{ $item->innovation_result}}</td>
                </tr>
                <tr>
                    <th>Anggaran</th>
                    <td>{{ $item->budget}} <br>
                        @if($item->budget_file)
                        <iframe src="{{  Storage::url($item->budget_file)  }}"
                            frameBorder="0"
                            scrolling="auto"
                         height="100%"
                         width="100%"
                        ></iframe>
                      <br>
                    @else 
                      Tidak ada file
                    @endif</td>
                    
                </tr>
                <tr>
                    <th>Profil Bisnis</th>
                    <td>{{ $item->profil_bisnis }} <br>
                        @if($item->profil_bisnis_file)
                        <iframe src="{{  Storage::url($item->profil_bisnis_file)  }}"
                            frameBorder="0"
                            scrolling="auto"
                         height="100%"
                         width="100%"
                        ></iframe>
                          <br>
                        @else 
                          Tidak ada file
                        @endif</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
