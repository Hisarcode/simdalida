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
                                <h2 class="sidebar-title blog-title pb-4">Pengaduan</h2>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">

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

                        <!-- Contact Form -->
                        <div class="contact-form-area m-top-30">
                            <form class="form" method="POST" action="{{ route('complain.store') }}">
                                @csrf
                                <div class="row">
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
                                            <input type="email" name="email" placeholder="E-mail" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group" style="color: black">
                                            <select name="purpose_innovation" required class="form-control"
                                                style="color: black">
                                                <option value="">Pilih Tujuan Pengaduan Inovasi</option>
                                                @foreach ($innovation as $in)
                                                <option value="{{ $in->id }}">
                                                    {{ $in->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-envelope"></i></div>
                                            <input type="text" name="subject" placeholder="Subjek Aduan" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group textarea">
                                            <div class="icon"><i class="fa fa-pencil"></i></div>
                                            <textarea type="textarea" name="description" rows="5"
                                                placeholder="Penjelasan Aduan" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="bizwheel-btn theme-2">Kirim Aduan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--/ End contact Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Services -->
@endsection