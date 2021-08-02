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
                                    <h2 class="sidebar-title blog-title pb-4">Inovasi-Inovasi Daerah</h2>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="portfolio-main">
                                <div id="portfolio-item" class="portfolio-item-active">
                                    @foreach ($infographic as $item)
                                    <div class="cbp-item business animation">
                                        <!-- Single Portfolio -->
                                        <div class="single-portfolio">
                                            <div class="portfolio-head overlay">
                                               @if ($item->image)
                                               <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}">
                                               @else
                                               <img src="front/img/logo-sgu.png" alt="{{ $item->name }}" style="height: 280px">
                                               @endif
                                                <a class="more" href="{{ route('infographic-detail', $item->id) }}"><i
                                                        class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                            <div class="portfolio-content">
                                                <h4><a href="{{ route('infographic-detail', $item->id) }}">{{ $item->name }}</a></h4>
                                                <p>{{ $item->user->name }}</p>
                                            </div>
                                        </div>
                                        <!--/ End Single Portfolio -->
                                    </div>
                                    @endforeach
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
