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
                        <div class="mt-5 alert alert-success alert-dismissable">
                            {{session('status')}}
                        </div>
                        @endif

                        <!-- Contact Form -->
                        <div class="contact-form-area m-top-30">
                            <form class="form" method="POST" action="{{ route('complain.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-user"></i></div>
                                            <input type="text" name="name" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-phone"></i></div>
                                            <input type="text" name="no_hp" placeholder="Nomor Handphone">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="icon"><i class="fa fa-envelope"></i></div>
                                            <input type="text" name="email" placeholder="E-mail">
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
                                            <input type="text" name="subject" placeholder="Subjek Aduan">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group textarea">
                                            <div class="icon"><i class="fa fa-pencil"></i></div>
                                            <textarea type="textarea" name="description" rows="5"
                                                placeholder="Penjelasan Aduan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="bizwheel-btn theme-2">Send Now</button>
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