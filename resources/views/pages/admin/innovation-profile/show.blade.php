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
                    <th>Tahapan Inovasi</th>
                    <td>@foreach (json_decode($item->innovation_proposal->innovation_step) as $step)
                         {{$step}} 
                        @endforeach</td>
                </tr>
                <tr>
                    <th>Regulasi Inovasi Daerah</th>
                    <td>{{ $item->regulasi_inovasi }} <br>
                        @if($item->regulasi_inovasi_file)
                        <a href="{{  Storage::url($item->regulasi_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>Ketersediaan SDM terhadap Inovasi Daerah</th>
                    <td>{{ $item->ketersediaan_sdm }} <br>
                        @if($item->ketersediaan_sdm_file)
                        <a href="{{  Storage::url($item->ketersediaan_sdm_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif</td>
                </tr>
                <tr>
                    <th>Dukungan Anggaran</th>
                    <td>{{ $item->dukungan_anggaran }} <br>
                        @if($item->dukungan_anggaran_file)
                        <a href="{{  Storage::url($item->dukungan_anggaran_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif</td>
                </tr>
                <tr>
                    <th>Penggunaan IT</th>
                    <td>{{ $item->penggunaan_it }} <br>
                        @if($item->penggunaan_it_file)
                        <a href="{{  Storage::url($item->penggunaan_it_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Bimtek Inovasi</th>
                    <td>{{ $item->bimtek_inovasi }} <br>
                        @if($item->bimtek_inovasi_file)
                        <a href="{{  Storage::url($item->bimtek_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif</td>
                </tr>
                <tr>
                    <th>Program dan kegiatan inovasi perangkat daerah dalam RKPD</th>
                    <td>{{ $item->program_rkpd }} <br>
                        @if($item->program_rkpd_file)
                        <a href="{{  Storage::url($item->program_rkpd_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif
                    </td>
                </tr>
                <tr>
                    <th>Keterlibatan Aktor Inovasi</th>
                    <td>{{ $item->keterlibatan_aktor }} <br>
                        @if($item->keterlibatan_aktor_file)
                        <a href="{{  Storage::url($item->keterlibatan_aktor_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Pelaksana Inovasi Daerah</th>
                    <td>{{ $item->pelaksana_inovasi }} <br>
                        @if($item->pelaksana_inovasi_file)
                        <a href="{{  Storage::url($item->pelaksana_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Jejaring Inovasi</th>
                    <td>{{ $item->jejaring_inovasi}} <br>
                        @if($item->pelaksana_inovasi_file)
                        <a href="{{  Storage::url($item->jejaring_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Sosialisai Inovasi Daerah</th>
                    <td>{{ $item->sosialisasi_inovasi}} <br>
                        @if($item->sosialisasi_inovasi_file)
                        <a href="{{  Storage::url($item->sosialisasi_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Pedoman Teknis</th>
                    <td>{{ $item->pedoman_teknis}} <br>
                        @if($item->pedoman_teknis_file)
                        <a href="{{  Storage::url($item->pedoman_teknis_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Kemudahan Informasi Layanan</th>
                    <td>{{ $item->kemudahan_informasi}} <br>
                        @if($item->kemudahan_informasi_file)
                        <a href="{{  Storage::url($item->kemudahan_informasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Kemudahan Proses Inovasi yang dihasilkan</th>
                    <td>{{ $item->kemudahan_proses}} <br>
                        @if($item->kemudahan_proses_file)
                        <a href="{{  Storage::url($item->kemudahan_proses_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Penyelesaian Layanan Pengaduan</th>
                    <td>{{ $item->penyelesaian_pengaduan }} <br>
                        @if($item->penyelesaian_pengaduan_file)
                        <a href="{{  Storage::url($item->penyelesaian_pengaduan_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Online Sistem</th>
                    <td>{{ $item->online_sistem}} <br>
                        @if($item->online_sistem_file)
                        <a href="{{  Storage::url($item->online_sistem_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Replikasi</th>
                    <td>{{ $item->replikasi}} <br>
                        @if($item->replikasi_file)
                        <a href="{{  Storage::url($item->replikasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Kecepatan Inovasi</th>
                    <td>{{ $item->kecepatan_inovasi}} <br>
                        @if($item->kecepatan_inovasi_file)
                        <a href="{{  Storage::url($item->kecepatan_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Kemanfaatan Inovasi</th>
                    <td>{{ $item->kemanfaatan_inovasi }} <br>
                        @if($item->kemanfaatan_inovasi_file)
                        <a href="{{  Storage::url($item->kemanfaatan_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif</td>
                </tr>
                <tr>
                    <th>Monitoring dan eveluasi inovasi daerah</th>
                    <td>{{ $item->monitoring_evaluasi }} <br>
                        @if($item->monitoring_evaluasi_file)
                        <a href="{{  Storage::url($item->monitoring_evaluasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif </td>
                </tr>
                <tr>
                    <th>Kualitas Inovasi, thumbnail video & Video:</th>
                    <td>  @if($item->kualitas_inovasi)
                        <a href="{{  Storage::url($item->kualitas_inovasi)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat thumbnail</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif
                        <br>
                    
                    @if($item->kualitas_inovasi_file)
                        <a href="{{  Storage::url($item->kualitas_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat video</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file</small>
                    @endif
                </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection