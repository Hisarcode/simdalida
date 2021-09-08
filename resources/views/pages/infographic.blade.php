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


                <div class="row mt-5">
                    <div class="col-12">
                        <div class="portfolio-main">


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Inovator</th>
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
                                                @if ($profile->innovation_proposal->innovation_step == '["Tahap Inisiatif"]')
                                                    
                                                @else
                                                
                                                @if ($profile->sign == 0)
                                                <i class="fa fa-exclamation-triangle" aria-hidden="true" data-toggle="tooltip" title="Ada Laporan yg belum dikumpulkan" style="color: red"></i>
                                                @endif                                                    
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