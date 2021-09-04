@extends('layouts.landing')

@section('content')
<!-- Hero Slider -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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
                                <div class="icon"><i class="fa fa-pencil"></i></div>
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

<section class="hero-slider style1">
    <div class="home-slider">
        <!-- Single Slider -->
        @foreach ($carousel as $item)
        <div class="single-slider" style="background-image:url('{{ asset(Storage::url($item->carousel_image)) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-8 col-12">
                        <div class="welcome-text">
                            <div class="hero-text">
                                <h1>{{ $item->title }}</h1>
                                <div class="p-text">
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--/ End Single Slider -->
    </div>
</section>
<!--/ End Hero Slider -->

<!-- Counterup -->
<section class="counterup">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-external-link-square"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $proposal }}</b><span></span></h3>
                        </div>
                        <p>Inovasi Masuk</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-check-square"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $terealisasi }}</b><span></span></h3>
                        </div>
                        <p>Inovasi Terealisasi</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $user }}</b><span></span></h3>
                        </div>
                        <p>Inovator</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-inbox"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $complains }}</b><span></span></h3>
                        </div>
                        <p>Jumlah Aduan</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>

        </div>
    </div>
</section>
<!--/ End Counterup -->

<!-- Video Feature -->
<section class="video-feature side overlay section-bg">
    <div class="container">
        <div class="row">
            @foreach ($video as $video)
            <div class="col-lg-6 col-md-6 col-12">
                <div class="img-feature ">
                    <img src="{{ Storage::url($video->thumbnail) }}" alt="Video Thumbnail">
                    <div class="video-play">
                        <a href="{{ $video->video }}" class="video video-popup mfp-iframe">
                            <i class="fa fa-play"></i>
                        </a>
                        <div class="waves-block">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-lg-6 col-md-6 col-12">
                <div class="features-main ">
                    <div class="title">
                        <h2>Profil Sanggau</h2>
                        <p style="color: antiquewhite">{{ \Illuminate\Support\Str::limit($video->about_content, 350, $end='...') }}</p>
                    </div>
                    <div class="section-top mt-3">
                        <a href="{{ route('video') }}"><button class="btn btn-success">Lihat
                                Video Inovasi</button></a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Video Feature -->

<!-- Portfolio -->
<section class="portfolio section-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="section-title default text-center">
                    <div class="section-top">
                        <h1><b>Infografis</b></h1>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="portfolio-main">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Inovator</th>
                                    <th>Nama Inovasi Daerah</th>
                                    <th>Bentuk Inovasi</th>
                                    <th>Tipe inovasi</th>
                                    <th>Lihat Detail</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                        $i = 1;
                                        ?>
                                @forelse ($infographic as $profile)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $profile->user->name }}</td>
                                    <td>{{ $profile->innovation_proposal->name }}</td>
                                    <td>{{ $profile->innovation_proposal->innovation_formats }}</td>
                                    <td>{{ $profile->innovation_proposal->innovation_type }}</td>
                                    <td>
                                        <a href="{{ route('infographic-detail', $profile->id) }}"
                                            class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a> 
                                        @guest
                                        @endguest
                                        @auth
                                        @if ($profile->sign == 0)
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="Ada Laporan yg belum dikumpulkan" style="color: red"></i>
                                        @endif
                                        @endauth
                                    </td>
                                   
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                        <div class="section-title default text-center">
                            <div class="section-top">
                                <a href="{{ route('infographic') }}"><button class="bizwheel-btn theme-2">Lihat
                                        Selengkapnya</button></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Portfolio -->
@endsection

@push('addon-script')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
@endpush