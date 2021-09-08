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
            <div class="col-lg col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-single-main">
                            <div class="main-image">
                                <h2 class="sidebar-title blog-title pb-4">Video Inovasi-Inovasi Daerah</h2>
                            </div>
                            <form action="{{ route('video-cari') }}" method="GET">
                                <input type="text" name="cari" placeholder="Cari Video .." value="{{ old('cari') }}">
                                <input type="submit" value="CARI">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="portfolio-main">
                            <div id="portfolio-item" class="portfolio-item-active">
                                <?php 
                                $count = $report->count();    
                                ?>
                                @if ($count>0)
                                @forelse ($report as $video)
                                @if ($video->kualitas_inovasi)
                                <?php 
                                $count2 = $report->count();
                                ?>
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
                                @else
                                <div class="cbp-item business animation">
                                  <h4>Data yang anda cari tidak ada...</h4>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{ $report->links() }}

            </div>

        </div>
    </div>
</section>
<!--/ End Services -->
@endsection