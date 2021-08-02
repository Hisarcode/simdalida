@extends('layouts.landing')

@section('content')    
    <!-- Blog Single -->
    <section class="news-area archive blog-single section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-single-main">
                                <div class="main-image">
                                    <h2 class="sidebar-title blog-title pb-4">{{ $infographic->name }}</h2>


                                    @if ($infographic->image)
                                    <img src="{{ Storage::url($infographic->image) }}" alt="{{ $infographic->name }}">
                                    @else
                                    <img src="front/img/logo-sgu.png" alt="{{ $infographic->name }}">
                                    @endif
                                </div>
                                <div class="blog-detail">
                                    <!-- News meta -->
                                    <ul class="news-meta">
                                        <li><i class="fa fa-user"></i>{{ $infographic->user->name }}</li>
                                        <li><i class="fa fa-pencil"></i>{{ \Carbon\Carbon::parse($infographic->innovation_proposal->time_innovation_implement)->format('d, M Y') }}</li>
                                    </ul>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="40%">Nama Inovasi</th>
                                            <td>{{ $infographic->innovation_proposal->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi Inovasi</th>
                                            <td>{!! $infographic->description !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahapan Inovasi</th>
                                            <td>@foreach (json_decode($infographic->innovation_proposal->innovation_step) as $step)
                                                &middot; {{$step}} <br>
                                                @endforeach</td>
                                        </tr>
                                        <tr>
                                            <th>Inisiator Inovasi</th>
                                            <td> @foreach (json_decode($infographic->innovation_proposal->innovation_initiator) as $initiator)
                                                &middot; {{$initiator}} <br>
                                                @endforeach</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Inovasi</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Bentuk Inovasi</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_formats }}</td>
                                        </tr>
                                        <tr>
                                            <th>Covid 19 atau Non Covid 19?</th>
                                            <td>{{ $infographic->innovation_proposal->is_covid }}</td>
                                        </tr>
                                        <tr>
                                            <th>Urusan Inovasi Daerah</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_concern }}</td>
                                        </tr>
                                        <tr>
                                            <th>Waktu Inovasi Daerah Diterapkan</th>
                                            <td>{{ \Carbon\Carbon::parse($infographic->innovation_proposal->time_innovation_implement)->format('d, M Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Rancang Bangun Inovasi Daerah <br> dan pokok perubahan yg akan dilakukan</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_design}}</td>
                                        </tr>
                                        <tr>
                                            <th>Tujuan Inovasi Daerah</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_goal}}</td>
                                        </tr>
                                        <tr>
                                            <th>Manfaat yang diperoleh</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_benefit}}</td>
                                        </tr>
                                        <tr>
                                            <th>Hasil Inovasi</th>
                                            <td>{{ $infographic->innovation_proposal->innovation_result}}</td>
                                        </tr>
                                    </table>

                                    <!-- Post Nav -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-12">
                    <!-- Blog Sidebar -->
                    <div class="blog-sidebar">

                        <!-- News Sidebar -->
                        <div class="single-sidebar bizwheel_latest_news_widget">
                            <h2 class="sidebar-title">Post Terbaru</h2>
                            <!-- Single News -->
                            @foreach ($post as $item)
                            <div class="single-f-news">
                                <div class="post-thumb"><a href="{{ route('infographic-detail', $item->id) }}">@if ($item->image)
                                    <img src="{{ Storage::url($item->image) }}"
                                            alt="{{ $item->name }}">
                                @else
                                <img src="front/img/logo-sgu.png"
                                alt="{{ $item->name }}">
                                @endif</a></div>
                                <div class="content">
                                    <p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($item->innovation_proposal->time_innovation_implement)->format('d, M Y') }}</time></p>
                                    <h4 class="title"><a href="{{ route('infographic-detail', $item->id) }}">{{ $item->name }}</a></h4>
                                </div>
                            </div>
                            @endforeach
                            <!--/ End Single News -->
                        </div>
                        <!--/ End Single Sidebar -->


                    </div>
                    <!--/ End Blog Sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Services -->
@endsection
