@extends('layouts.landing')

@section('content')
<!-- Hero Slider -->
<section class="hero-slider style1">
    <div class="home-slider">
        <!-- Single Slider -->
        @foreach ($carousel as $item)
        <div class="single-slider" style="background-image:url('{{ asset(Storage::url($item->carousel_image)) }}')">
            {{-- {{Storage::url($item->carousel_image) }} --}}
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
            <div class="col-lg-4 col-md-4 col-12">
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
            <div class="col-lg-4 col-md-4 col-12">
                <!-- Single Counterup -->
                <div class="single-counter">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="conter-content">
                        <div class="counter-head">
                            <h3><b class="number">7</b><span>+</span></h3>
                        </div>
                        <p>Inovasi Terealisasi</p>
                    </div>
                </div>
                <!--/ End Single Counterup -->
            </div>
            <div class="col-lg-4 col-md-4 col-12">
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

        </div>
    </div>
</section>
<!--/ End Counterup -->

<!-- Video Feature -->
<section class="video-feature side overlay section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="img-feature ">
                    <img src="https://via.placeholder.com/800x685.png" alt="Video Thumbnail">
                    <div class="video-play">
                        <a href="https://www.youtube.com/watch?v=RLlPLqrw8Q4" class="video video-popup mfp-iframe">
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
            <div class="col-lg-6 col-md-6 col-12">
                <div class="features-main ">
                    <div class="title">
                        <h2>Video Inovasi Daerah</h2>
                        <p>Ini merupakan penjelasan dari video jika diperlukan</p>
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
                                    <th>Nama Inovasi</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>tipe</th>
                                    <th>Bentuk Inovasi</th>
                                    <th>Pemilik Inovasi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($profile as $profile)
                                <tr>
                                    <td>{{ $profile->name }}
                                    </td>
                                    <td> {{Str::limit($profile->description, 20)}}</td>
                                    <td>
                                        <img src="{{ Storage::url($profile->image) }}" alt="{{ $profile->name }}"
                                            width="200px" class="img-thumbnail">
                                    </td>
                                    <td>{{ $profile->innovation_proposal->innovation_type }}</td>
                                    <td>{{ $profile->innovation_proposal->innovation_formats }}</td>
                                    <td>{{ $profile->user->username }} <br>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Portfolio -->
@endsection