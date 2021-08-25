@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Proposal
                                Inovasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $proposal }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hotel fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    @if (Auth::user()->roles == 'SUPERADMIN' || Auth::user()->roles == 'ADMIN')
                    <p>Menunggu Acc : {{ $blm_acc }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Laporan Inovasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $report }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        @if (Auth::user()->roles == 'SUPERADMIN' ||  Auth::user()->roles == 'ADMIN')
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pengaduan yang
                                Belum Ditindaklanjuti</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $is_improvement }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->roles == 'OPERATOR')
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pengaduan yang
                                Belum Ditindaklanjuti</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $sum }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-spinner fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>

    @if (Auth::user()->roles == 'OPERATOR')
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-gray-100">Notifikasi Laporan Inovasi</h6>
                </div>
                <div class="card-body ">
                    <div class="overflow-auto" style="height:300px;
                    overflow-y: scroll;">


                        @forelse ($notifications as $notification)
                        <div class="card mb-4 py-0 my-0 border-bottom-warning">
                            <div class="card-body p-1 m-1">
                                <h6 class="font-weight-bold">{{ $notification->name }}</h6>
                                <p>{{ $notification->message  }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">Tidak ada notifikasi</p>
                        <hr>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-gray-100">Notifikasi Pengaduan Masuk</h6>
                </div>
                <div class="card-body ">
                    <div class="overflow-auto" style="height:300px;
                    overflow-y: scroll;">

                        @forelse ($complains as $complain)
                        <div class="card mb-4 py-0 my-0 border-bottom-warning">
                            <div class="card-body p-1 m-1">
                                <h6 class="font-weight-bold">Nama pengirim: {{ $complain->name }}</h6>
                                <p>@if ($complain->is_improvement == 'belum')
                                    <b>Belum Ditindaklanjuti</b>, sisa waktu : 
                                    <div data-countdown="{{ $complain->end_time }}" style="display: inline">
                                        <li style="display: inline" data-days="00">00</li>
                                        <li style="display: inline" data-hours="00">00</li>
                                        <li style="display: inline" data-minuts="00">00</li>
                                        <li style="display: inline" data-seconds="00">00<li>                 
                                    </div>
                                @endif</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-center">Tidak ada notifikasi pengaduan</p>
                        <hr>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

</div>
<!-- /.container-fluid -->
@endsection

@push('addon-script')

<script>

    $('[data-countdown]').each(function () {
        var $deadline = new Date($(this).data('countdown')).getTime();

        var $dataDays = $(this).children('[data-days]');
        var $dataHours = $(this).children('[data-hours]');
        var $dataMinuts = $(this).children('[data-minuts]');
        var $dataSeconds = $(this).children('[data-seconds]');

        var x = setInterval(function () {

            var now = new Date().getTime();
            var t = $deadline - now;

            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            var hours = Math.floor(t % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            var minuts = Math.floor(t % (1000 * 60 * 60) / (1000 * 60));
            var seconds = Math.floor(t % (1000 * 60) / (1000));

            if (days < 10) {
                days = '0' + days;
            }

            if (hours < 10) {
                hours = '0' + hours;
            }

            if (minuts < 10) {
                minuts = '0' + minuts;
            }

            if (seconds < 10) {
                seconds = '0' + seconds;
            }

            $dataDays.html(days + 'hari');
            $dataHours.html(hours + 'jam');
            $dataMinuts.html(minuts + 'menit');
            $dataSeconds.html(seconds + 'detik');


            if (t <= 0) {
                clearInterval(x);

                $dataDays.html('Waktu');
                $dataHours.html('--');
                $dataMinuts.html('');
                $dataSeconds.html('Habis!');
            }



        }, 1000);
    })

</script>
@endpush