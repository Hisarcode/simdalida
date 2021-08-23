@extends('layouts.landing')

@section('content')
	<!-- Blog Single -->
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
                                        <a href="{{ Storage::url($video->kualitas_inovasi_file) }}" class="video video-popup mfp-iframe">
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
    
                                    </table>
                     
                       
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