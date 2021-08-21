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

    <button class="chat-btn">
        Hubungi Kami
    </button>

    <div class="chat-popup">
        <div class="chat-area">

            <p class="text-center  text-bold py-3">Hubungi Kami</p>
            <div class="contact-form-area m-top-30 p-0 m-0" style="background-color: #2E2751">
                <form class="form" method="POST" action="{{ route('chat.store') }}">
                    @csrf
                    <div class="row p-0 m-0">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <input type="text" name="no_hp" placeholder="Nomor Handphone" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="icon"><i class="fa fa-envelope"></i></div>
                                <input type="text" name="email" placeholder="E-mail" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="icon"><i class="fa fa-envelope"></i></div>
                                <input type="text" name="subject" placeholder="Subjek" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group textarea">
                                <div class="icon"><i class="fa fa-pencil"></i></div>
                                <textarea type="textarea" name="description" rows="5" placeholder="Deskripsi"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group button">
                                <button type="submit" class="bizwheel-btn theme-2">Send Now</button>
                            </div>
                        </div>
                    </div>
                </form>
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
                    <div class="icon"><i class="fa fa-book"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $proposal }}</b><span>+</span></h3>
                        </div>
                        <p>Inovasi Masuk</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">0</b><span>+</span></h3>
                        </div>
                        <p>Inovasi Terealisasi</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-life-ring"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $user }}</b><span>+</span></h3>
                        </div>
                        <p>Perangkat Daerah</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-life-ring"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">{{ $complains }}</b><span>+</span></h3>
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
                        <h2>Video Inovasi Daerah</h2>
                        {{-- <p>Ini merupakan penjelasan dari video jika diperlukan</p> --}}
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
                                    <th>Perangkat Daerah</th>
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
                                    <td>{{ $profile->name }}</td>
                                    <td>{{ $profile->innovation_proposal->innovation_formats }}</td>
                                    <td>{{ $profile->innovation_proposal->innovation_type }}</td>
                                    <td>
                                        <a href="{{ route('infographic-detail', $profile->id) }}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
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