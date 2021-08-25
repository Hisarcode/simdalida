@extends('layouts.landing')

@section('content')
<!-- Blog Single -->
<section class="news-area archive blog-single section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-single-main">
                            <div class="main-image">
                                <h2 class="sidebar-title blog-title pb-4">Video Inovasi-Inovasi Daerah</h2>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="portfolio-main">
                            <div id="portfolio-item" class="portfolio-item-active">
                                @forelse ($report as $video)
                                @if ($video->kualitas_inovasi)
                                <div class="cbp-item business animation">
                                    <!-- Single Portfolio -->
                                    <div class="single-portfolio">
                                        <div class="portfolio-head overlay">

                                            <img src="{{ Storage::url($video->kualitas_inovasi) }}"
                                                alt="#">
                                            <a class="more" href="{{ route('video-detail', $video->id) }}"><i
                                                    class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                        <div class="portfolio-content">
                                            <p>
                                                <a
                                                    href="{{ route('video-detail', $video->id) }}">{{ $video->innovation_proposal->name }}</a>
                                            </p>
                                            <p class="font-italic font-weight-bold"
                                                style="font-size: 11px ;  line-height: 120%;">
                                                {{ $video->user->name }}</p>
                                        </div>
                                    </div>
                                    <!--/ End Single Portfolio -->
                                </div>
                                @endif
                                @empty
                                <h5 class="text-center"> Tidak Ada Data</h5>
                                @endforelse
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