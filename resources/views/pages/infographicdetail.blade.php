@extends('layouts.landing')

@section('content')    
    <!-- Blog Single -->
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
                                    <div class="icon"><i class="fa fa-tag"></i></div>
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

    <section class="news-area archive blog-single section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-single-main">
                                <div class="main-image">
                                    <h2 class="sidebar-title blog-title pb-4">{{ $infographic->innovation_proposal->name }}</h2>


                                    @if ($infographic->kualitas_inovasi) 
                                    <img src="{{ Storage::url($infographic->kualitas_inovasi) }}" alt="{{ $infographic->innovation_proposal->name }}">
                                    @endif
                                </div>
                                <div class="blog-detail">
                                    
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="50%">Inovator</th>
                                                    <td>{{ $infographic->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Inovasi</th>
                                                    <td>{{ $infographic->innovation_proposal->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Waktu Inovasi Daerah Diterapkan</th>
                                                    <td>{{ \Carbon\Carbon::parse($infographic->innovation_proposal->time_innovation_implement)->format('d, M Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tahapan Inovasi</th>
                                                    <td>@foreach (json_decode($infographic->innovation_proposal->innovation_step) as $step)
                                                        {{$step}} <br>
                                                        @endforeach</td>
                                                </tr>
                                                <tr>
                                                    <th>Inisiator Inovasi</th>
                                                    <td> @foreach (json_decode($infographic->innovation_proposal->innovation_initiator) as $initiator)
                                                        {{$initiator}} <br>
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
                                            <a href="{{ route('infographic') }}" class="btn btn-primary">Kembali </a>
                                   
                                    

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
                            <h2 class="sidebar-title">Lihat Inovasi Lainnya</h2>
                            <!-- Single News -->
                            @foreach ($post as $item)
                            <div class="single-f-news">
                                <div class="post-thumb"><a href="{{ route('infographic-detail', $item->id) }}">@if ($item->kualitas_inovasi)
                                    <img src="{{ Storage::url($item->kualitas_inovasi) }}"
                                            alt="{{ $item->innovation_proposal->name }}">
                                @endif</a></div>
                                <div class="content">
                                    <p class="post-meta"><time class="post-date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($item->innovation_proposal->time_innovation_implement)->format('d, M Y') }}</time></p>
                                    <h4 class="title"><a href="{{ route('infographic-detail', $item->id) }}">{{ $item->innovation_proposal->name }}</a></h4>
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
