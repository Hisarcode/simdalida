@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Laporan {{ $item->name }}</h1>
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
                    <td>{{ $item->name }} <br>
                        @if($item->innovation_sk_file)
                        <iframe src="{{  Storage::url($item->innovation_sk_file)  }}"
                            frameBorder="0"
                            scrolling="auto"
                         height="100%"
                         width="100%"
                        ></iframe>
                      <br>
                    @else 
                      Tidak ada file
                    @endif
                    </td>
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
                    <th>Waktu Inovasi Daerah Diterapkan</th>
                    <td>{{ \Carbon\Carbon::parse($item->time_innovation_implement)->format('d, M-Y') }}</td>
                </tr>
                <tr>
                    <th>Permasalahan/kendala yang dihadapi <br>dalam pelaksanaan inovasi daerah</th>
                    <td>{{ $item->problem}}</td>
                </tr>
                <tr>
                    <th>Solusi yang dilakukan terhadap <br>permasalahan/kendala</th>
                    <td>{{ $item->solution}}</td>
                </tr>
                <tr>
                    <th>Tindaklanjut terhadap permasalahan/kendala</th>
                    <td>{{ $item->improvement}}</td>
                </tr>
                <tr>
                    <th>Jumlah Pengaduan/saran terkait inovasi</th>
                    <td>{{ $item->complain_innovation_total}} <br>
                        @if($item->complain_innovation_file)
                        <iframe src="{{  Storage::url($item->complain_innovation_file)  }}"
                            frameBorder="0"
                            scrolling="auto"
                         height="100%"
                         width="100%"
                        ></iframe>
                      <br>
                    @else 
                      Tidak ada file
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>Jumlah Pengaduan/saran yang sudah ditindaklanjuti</th>
                    <td>{{ $item->complain_improvement_total}} <br>
                        @if($item->complain_improvement_file)
                        <iframe src="{{  Storage::url($item->complain_improvement_file)  }}"
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
                    <th>Tingkat capaian tujuan inovasi daerah</th>
                    <td>{{ $item->achievement_goal_level}} <br>
                        @if($item->achievement_goal_level_file)
                        <iframe src="{{  Storage::url($item->achievement_goal_level_file)  }}"
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
                    <th>Kendala pencapaian tujuan <br>inovasi daerah</th>
                    <td>{{ $item->achievement_goal_problem}}</td>
                </tr>
                <tr>
                    <th>Tingkat Kemanfaatan inovasi daerah
                    </th>
                    <td>{{ $item->benefit_level }} <br>
                        @if($item->benefit_level_file)
                        <iframe src="{{  Storage::url($item->benefit_level_file)  }}"
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
                    <th>Tingkat capaian hasil inovasi daerah
                    </th>
                    <td>{{ $item->achievement_result_level }} <br>
                        @if($item->achievement_result_level_file)
                        <iframe src="{{  Storage::url($item->achievement_result_level_file)  }}"
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
                    <th>Kendala pencapaian hasil <br>inovasi daerah</th>
                    <td>{{ $item->achievement_result_problem}}</td>
                </tr>
                <tr>
                    <th>Strategi pelaksanaan inovasi</th>
                    <td>{{ $item->innovation_strategy}}</td>
                </tr>
                <tr>
                    <th>Video inovasi daerah</th>
                    <td>   @if($item->video_innovation)
                        <iframe src="{{  Storage::url($item->video_innovation)  }}"
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
