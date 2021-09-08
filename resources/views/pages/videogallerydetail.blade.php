@extends('layouts.landing')

@section('content')
	<!-- Blog Single -->
    <section>
        <!-- Button trigger modal -->
    <button type="button" class="chat-btn" data-toggle="modal" data-target="#exampleModal">
        Hubungi Kami
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="z-index: 999999">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hubungi Kami</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="contact-form-area m-top-30 m-bottom-30 p-0 m-0"  style="background-color: #2E2751">
                    <form class="form" method="POST" action="{{ route('chat.store') }}">
                        @csrf
                        <div class="row p-0 m-0 mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="name" placeholder="Nama" required autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" name="email" placeholder="E-mail" required>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="icon"><i class="fa fa-tag"></i></div>
                                    <input type="text" name="subject" placeholder="Subjek" required autocomplete="off">
                                </div>
                            </div>
    
                            <div class="col-12 mb-3">
                                <div class="form-group textarea">
                                    <div class="icon"><i class="fa fa-pencil"></i></div>
                                    <textarea type="textarea" name="description" rows="3" placeholder="Deskripsi"
                                        required autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                   
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
          </div>
        </div>
      </div>
    </section>

    <section class="news-area archive blog-single section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-single-main">
                                <div class="img-feature ">
                                    <img src="{{ Storage::url($video->kualitas_inovasi) }}" alt="Video Thumbnail">
                                    <div class="video-play">
                                        <a href="{{ $video->kualitas_inovasi_file }}" class="video video-popup mfp-iframe">
                                            <i class="fa fa-play"></i>
                                        </a>
                                        <div class="waves-block">
                                            <div class="waves wave-1"></div>
                                            <div class="waves wave-2"></div>
                                            <div class="waves wave-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-detail">
                                    <!-- News meta -->
                                    <h2 class="blog-title">{{ $video->innovation_proposal->name }}</h2>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="50%">Nama Perangkat Daerah</th>
                                            <td>{{ $video->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Inovasi</th>
                                            <td>{{ $video->innovation_proposal->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Regulasi Inovasi</th>
                                            <td>{{ $video->regulasi_inovasi }} <br>
                                                @if($video->regulasi_inovasi_file)
                                                <a href="{{  Storage::url($video->regulasi_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ketersediaan SDM terhadap Inovasi Daerah</th>
                                            <td>{{ $video->ketersediaan_sdm }} <br>
                                                @if($video->ketersediaan_sdm_file)
                                                <a href="{{  Storage::url($video->ketersediaan_sdm_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                                            @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Kecepatan Inovasi</th>
                                            <td>{{ $video->kecepatan_inovasi }} <br>
                                                @if($video->kecepatan_inovasi_file)
                                                <a href="{{  Storage::url($video->kecepatan_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                                            @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Kemanfaatan Inovasi</th>
                                            <td>{{ $video->kemanfaatan_inovasi }} <br>
                                                @if($video->kemanfaatan_inovasi_file)
                                                <a href="{{  Storage::url($video->kemanfaatan_inovasi_file)  }}" target="_blank" class="btn btn-sm btn-warning">Klik disini untuk melihat file</a>
                                            @endif</td>
                                        </tr>
                                        <tr>
                                            <th>Monitoring dan Evaluasi Inovasi Daerah</th>
                                            <td>{{ $video->monitoring_evaluasi }}</td>
                                        </tr>
                                        
    
                                    </table>
                                    <a href="{{ route('video-inovasi') }}" class="btn btn-primary">Kembali </a>
                     
                       
                                </div>
                            </div>
                        </div>
                    </div>						
                </div>		
            </div>
        </div>
    </section>	
    <!--/ End Services -->
@endsection