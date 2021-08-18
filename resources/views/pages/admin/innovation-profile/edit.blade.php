@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Profil Inovasi</b></h1>
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
            <h6><b>{{ $item->innovation_proposal->name }}</b></h6>
        </div>
        <div class="card-body">
            <form action="{{ route('innovation-profile.update', $item->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
          
                
                <div class="form-group">
                    <label for="regulasi_inovasi"><strong>Regulasi Inovasi Daerah*</strong></label>
                    <textarea type="text" name="regulasi_inovasi" id="regulasi_inovasi" class="form-control">{{ $item->regulasi_inovasi }}</textarea>

                    <label for="regulasi_inovasi_file">Upload file SK (PDF):</label>
                    @if($item->regulasi_inovasi_file)
                        <a href="{{  Storage::url($item->regulasi_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk membuka file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="regulasi_inovasi_file" name="regulasi_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="ketersediaan_sdm"><strong>Ketersediaan SDM terhadap inovasi daerah*</strong></label>
                    <textarea type="text" name="ketersediaan_sdm" id="ketersediaan_sdm" class="form-control">{{ $item->ketersediaan_sdm }}</textarea>

                    <label for="ketersediaan_sdm_file">Upload file SK (PDF):</label>
                    
                    @if($item->ketersediaan_sdm_file)
                        <a href="{{  Storage::url($item->ketersediaan_sdm_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="ketersediaan_sdm_file" name="ketersediaan_sdm_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="dukungan_anggaran"><strong>Dukungan Anngaran</strong></label>
                    <textarea type="text" name="dukungan_anggaran" id="dukungan_anggaran" class="form-control">{{ $item->dukungan_anggaran }}</textarea>

                    <label for="dukungan_anggaran_file">Upload file SK (PDF):</label>
                    
                    @if($item->dukungan_anggaran_file)
                        <a href="{{  Storage::url($item->dukungan_anggaran_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="dukungan_anggaran_file" name="dukungan_anggaran_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="penggunaan_it"><strong>Penggunaan IT</strong></label>
                    <textarea type="text" name="penggunaan_it" id="penggunaan_it" class="form-control">{{ $item->penggunaan_it }}</textarea>

                    <label for="penggunaan_it_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->penggunaan_it_file)
                        <a href="{{  Storage::url($item->penggunaan_it_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="penggunaan_it_file" name="penggunaan_it_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="bimtek_inovasi"><strong>Bimtek Inovasi</strong></label>
                    <textarea type="text" name="bimtek_inovasi" id="bimtek_inovasi" class="form-control">{{ $item->bimtek_inovasi }}</textarea>

                    <label for="bimtek_inovasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->bimtek_inovasi_file)
                        <a href="{{  Storage::url($item->bimtek_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="bimtek_inovasi_file" name="bimtek_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="program_rkpd"><strong>Program dan kegiatan inovasi perangkat daerah dalam RKPD</strong></label>
                    <textarea type="text" name="program_rkpd" id="program_rkpd" class="form-control">{{ $item->program_rkpd }}</textarea>

                    <label for="program_rkpd_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->program_rkpd_file)
                        <a href="{{  Storage::url($item->program_rkpd_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="program_rkpd_file" name="program_rkpd_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="keterlibatan_aktor"><strong>Keterlibatan Aktor Inovasi</strong></label>
                    <textarea type="text" name="keterlibatan_aktor" id="keterlibatan_aktor" class="form-control">{{ $item->keterlibatan_aktor }}</textarea>

                    <label for="keterlibatan_aktor_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->keterlibatan_aktor_file)
                        <a href="{{  Storage::url($item->keterlibatan_aktor_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="keterlibatan_aktor_file" name="keterlibatan_aktor_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="pelaksana_inovasi"><strong>Pelaksana Inovasi Daerah</strong></label>
                    <textarea type="text" name="pelaksana_inovasi" id="pelaksana_inovasi" class="form-control">{{ $item->pelaksana_inovasi }}</textarea>

                    <label for="pelaksana_inovasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->pelaksana_inovasi_file)
                        <a href="{{  Storage::url($item->pelaksana_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="pelaksana_inovasi_file" name="pelaksana_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="jejaring_inovasi"><strong>Jejaring Inovasi Daerah</strong></label>
                    <textarea type="text" name="jejaring_inovasi" id="jejaring_inovasi" class="form-control">{{ $item->jejaring_inovasi }}</textarea>

                    <label for="jejaring_inovasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->pelaksana_inovasi_file)
                        <a href="{{  Storage::url($item->jejaring_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="jejaring_inovasi_file" name="jejaring_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="sosialisasi_inovasi"><strong>Sosialisasi Inovasi Daerah</strong></label>
                    <textarea type="text" name="sosialisasi_inovasi" id="sosialisasi_inovasi" class="form-control">{{ $item->sosialisasi_inovasi }}</textarea>

                    <label for="sosialisasi_inovasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->sosialisasi_inovasi_file)
                        <a href="{{  Storage::url($item->sosialisasi_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="sosialisasi_inovasi_file" name="sosialisasi_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="pedoman_teknis"><strong>Pedoman Teknis</strong></label>
                    <textarea type="text" name="pedoman_teknis" id="pedoman_teknis" class="form-control">{{ $item->pedoman_teknis }}</textarea>

                    <label for="pedoman_teknis_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->pedoman_teknis_file)
                        <a href="{{  Storage::url($item->pedoman_teknis_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="pedoman_teknis_file" name="pedoman_teknis_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="kemudahan_informasi"><strong>Kemudahan Informasi</strong></label>
                    <textarea type="text" name="kemudahan_informasi" id="kemudahan_informasi" class="form-control">{{ $item->kemudahan_informasi }}</textarea>

                    <label for="kemudahan_informasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->kemudahan_informasi_file)
                        <a href="{{  Storage::url($item->kemudahan_informasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="kemudahan_informasi_file" name="kemudahan_informasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="kemudahan_proses"><strong>Kemudahan Proses</strong></label>
                    <textarea type="text" name="kemudahan_proses" id="kemudahan_proses" class="form-control">{{ $item->kemudahan_proses }}</textarea>

                    <label for="kemudahan_proses_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->kemudahan_proses_file)
                        <a href="{{  Storage::url($item->kemudahan_proses_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="kemudahan_proses_file" name="kemudahan_proses_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="penyelesaian_pengaduan"><strong>Penyelesaian Pengaduan</strong></label>
                    <textarea type="text" name="penyelesaian_pengaduan" id="penyelesaian_pengaduan" class="form-control">{{ $item->penyelesaian_pengaduan }}</textarea>

                    <label for="penyelesaian_pengaduan_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->penyelesaian_pengaduan_file)
                        <a href="{{  Storage::url($item->penyelesaian_pengaduan_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="penyelesaian_pengaduan_file" name="penyelesaian_pengaduan_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="online_sistem"><strong>Online Sistem</strong></label>
                    <textarea type="text" name="online_sistem" id="online_sistem" class="form-control">{{ $item->online_sistem }}</textarea>

                    <label for="online_sistem_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->online_sistem_file)
                        <a href="{{  Storage::url($item->online_sistem_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="online_sistem_file" name="online_sistem_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="replikasi"><strong>Replikasi</strong></label>
                    <textarea type="text" name="replikasi" id="replikasi" class="form-control">{{ $item->replikasi }}</textarea>

                    <label for="replikasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->replikasi_file)
                        <a href="{{  Storage::url($item->replikasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="replikasi_file" name="replikasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="kecepatan_inovasi"><strong>Kecepatan Inovasi*</strong></label>
                    <textarea type="text" name="kecepatan_inovasi" id="kecepatan_inovasi" class="form-control">{{ $item->kecepatan_inovasi }}</textarea>

                    <label for="kecepatan_inovasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->kecepatan_inovasi_file)
                        <a href="{{  Storage::url($item->kecepatan_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="kecepatan_inovasi_file" name="kecepatan_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="kemanfaatan_inovasi"><strong>Kemanfaatan Inovasi*</strong></label>
                    <textarea type="text" name="kemanfaatan_inovasi" id="kemanfaatan_inovasi" class="form-control">{{ $item->kemanfaatan_inovasi }}</textarea>

                    <label for="kemanfaatan_inovasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->kemanfaatan_inovasi_file)
                        <a href="{{  Storage::url($item->kemanfaatan_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="kemanfaatan_inovasi_file" name="kemanfaatan_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="monitoring_evaluasi"><strong>Monitoring dan Evaluasi Inovasi Daerah*</strong></label>
                    <textarea type="text" name="monitoring_evaluasi" id="monitoring_evaluasi" class="form-control">{{ $item->monitoring_evaluasi }}</textarea>

                    <label for="monitoring_evaluasi_file">Upload file pendukung (PDF):</label>
                    
                    @if($item->monitoring_evaluasi_file)
                        <a href="{{  Storage::url($item->monitoring_evaluasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="monitoring_evaluasi_file" name="monitoring_evaluasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                </div>

                <div class="form-group">
                    <label for="kualitas_inovasi"><strong>Kualitas Inovasi Daerah, Upload Thumbnail Video*:</strong></label>
                    
                    @if($item->kualitas_inovasi)
                        <a href="{{  Storage::url($item->kualitas_inovasi)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat file sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="kualitas_inovasi" name="kualitas_inovasi" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah file sebelumnya</small>
                    <br>
                    <label for="kualitas_inovasi_file"><strong>Upload video Inovasi (max 8 mb):</strong></label>
                    
                    @if($item->kualitas_inovasi_file)
                        <a href="{{  Storage::url($item->kualitas_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik Disini untuk melihat video sebelumnya</a>
                      <br>
                    @else 
                    <small class="text-muted">tidak ada file sebelumnya</small>
                    @endif
                    <input class="form-control" id="kualitas_inovasi_file" name="kualitas_inovasi_file" type="file">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah video sebelumnya</small>
                </div>


                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
{{-- @push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endpush --}}