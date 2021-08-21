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
                                <h2 class="sidebar-title blog-title pb-4">
                                    {{ 'Video ' . $video->name . ' Triwulan Ke-' . $video->quartal  }}</h2>



                            </div>
                            <div class="blog-detail">

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



                                <!-- Post Nav -->
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