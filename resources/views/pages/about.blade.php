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
                                    <h2 class="sidebar-title blog-title pb-4">Tentang Kami</h2>
                                </div>

                            </div>
                        </div>
                    </div>
                    @foreach ($about as $a)
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-6 col-12">
                            <!-- About Video -->
                            <div class="modern-img-feature">
                                <img src="{{ Storage::url($a->about_image) }}" alt="#">

                            </div>
                            <!--/End About Video  -->
                        </div>
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="about-content section-title default text-left">

                                <div class="section-bottom">
                                    <div class="text">
                                        <p>{{ $a->about_content }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
               

                </div>

            </div>
        </div>
    </section>
    <!--/ End Services -->    
@endsection