@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Review Proposal {{ $item->name }}</h1>
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
            @if (!empty($review))
            <table class="table table-bordered">
                <form action="{{ route('review-proposal.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <tr>
                    <th><strong>Indikator</strong></th>
                    <th><strong>Isian Operator</strong></th>
                    <th style="width: 400px"><strong>Komentar Admin</strong></th>
                </tr>
                <tr>
                    <th>Nama Inovasi</th>
                    <td>{{ $item->name }}</td>
                    <td><textarea type="text" name="name" id="name" class="form-control">{{ $review->name }}</textarea></td>
                </tr>
                <tr>
                    <th>Tahapan Inovasi</th>
                    <td>@foreach (json_decode($item->innovation_step) as $step)
                        {{$step}} <br>
                    @endforeach</td>
                    <td><textarea type="text" name="innovation_step" id="innovation_step" class="form-control">{{ $review->innovation_step }}</textarea></td>
                </tr>
                <tr>
                    <th>Inisiator Inovasi</th>
                    <td>  @foreach (json_decode($item->innovation_initiator) as $initiator)
                        {{$initiator}} <br>
                    @endforeach</td>
                    <td><textarea type="text" name="innovation_initiator" id="innovation_initiator" class="form-control">{{ $review->innovation_initiator }}</textarea></td>
                </tr>
                <tr>
                    <th>Jenis Inovasi</th>
                    <td>{{ $item->innovation_type }}</td>
                    <td><textarea type="text" name="innovation_type" id="innovation_type" class="form-control">{{ $review->innovation_type }}</textarea></td>
                </tr>
                <tr>
                    <th>Bentuk Inovasi</th>
                    <td>{{ $item->innovation_formats }}</td>
                    <td><textarea type="text" name="innovation_formats" id="innovation_formats" class="form-control">{{ $review->innovation_formats }}</textarea></td>
                </tr>
                <tr>
                    <th>Covid 19 atau Non Covid 19?</th>
                    <td>{{ $item->is_covid }}</td>
                    <td><textarea type="text" name="is_covid" id="is_covid" class="form-control">{{ $review->is_covid }}</textarea></td>
                </tr>
                <tr>
                    <th>Urusan Inovasi Daerah</th>
                    <td>{{ $item->innovation_concern }}</td>
                    <td><textarea type="text" name="innovation_concern" id="innovation_concern" class="form-control">{{ $review->innovation_concern }}</textarea></td>
                </tr>
                <tr>
                    <th>Waktu Uji Coba Inovasi Daerah</th>
                    <td>{{ \Carbon\Carbon::parse($item->start_innovation_trial)->format('d, M-Y') }} hingga {{ \Carbon\Carbon::parse($item->end_innovation_trial)->format('d, M-Y') }}</td>
                    <td><textarea type="text" name="start_innovation_trial" id="start_innovation_trial" class="form-control">{{ $review->start_innovation_trial }}</textarea></td>
                </tr>
                <tr>
                    <th>Waktu Inovasi Daerah Diterapkan</th>
                    <td>{{ \Carbon\Carbon::parse($item->time_innovation_implement)->format('d, M-Y') }}</td>
                    <td><textarea type="text" name="time_innovation_implement" id="time_innovation_implement" class="form-control">{{ $review->time_innovation_implement }}</textarea></td>
                </tr>
                <tr>
                    <th>Rancang Bangun Inovasi Daerah <br> dan pokok perubahan yg akan dilakukan</th>
                    <td>{{ $item->innovation_design}}</td>
                    <td><textarea type="text" name="innovation_design" id="innovation_design" class="form-control">{{ $review->innovation_design }}</textarea></td>
                </tr>
                <tr>
                    <th>Tujuan Inovasi Daerah</th>
                    <td>{{ $item->innovation_goal}}</td>
                    <td><textarea type="text" name="innovation_goal" id="innovation_goal" class="form-control">{{ $review->innovation_goal }}</textarea></td>
                </tr>
                <tr>
                    <th>Manfaat yang diperoleh</th>
                    <td>{{ $item->innovation_benefit}}</td>
                    <td><textarea type="text" name="innovation_benefit" id="innovation_benefit" class="form-control">{{ $review->innovation_benefit }}</textarea></td>
                </tr>
                <tr>
                    <th>Hasil Inovasi</th>
                    <td>{{ $item->innovation_result}}</td>
                    <td><textarea type="text" name="innovation_result" id="innovation_result" class="form-control">{{ $review->innovation_result }}</textarea></td>
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
                    <td><textarea type="text" name="budget" id="budget" class="form-control">{{ $review->budget }}</textarea></td>
                    
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
                        <td><textarea type="text" name="profil_bisnis" id="profil_bisnis" class="form-control">{{ $review->profil_bisnis }}</textarea></td>
                </tr>
            </table>   
            <button type="submit" class="btn btn-primary btn-block">
                Ubah Data
            </button>
            @endif
        </div>
    </div> 
</div>
<!-- /.container-fluid -->
@endsection
