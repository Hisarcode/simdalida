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


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!--/ End Services -->
@endsection

@push('addon-script')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
@endpush