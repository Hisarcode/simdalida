@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pengaduan</h1>    
    </div>


    <div class="card shadow mb-4"> 
        <div class="card-body">
            @if(session('status'))
                <div class="mt-3 alert alert-success alert-dismissable">
                    {{session('status')}}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Inovasi yang diadukan</th>
                            <th>Nama Pengirim</th>
                            <th>Subject Aduan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        $i = 1;
                        $j = 1;
                        $total_belum =0;
                        ?>
                        @forelse ($complains as $complain)
                        @if (Auth::user()->roles === 'SUPERADMIN')
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><b>{{ $complain->innovation_complain->name }}</b>
                                <br><br>Pemilik Inovasi : {{ $complain->innovation_complain->user->name }}
                            </td>
                            <td>{{ $complain->name }}</td>
                            <td>{{ $complain->subject }}</td>
                            <td>
                                @if ($complain->is_improvement == "sudah")
                                <i class="fa fa-check" aria-hidden="true"></i> <b>Sudah Ditindaklanjuti</b>
                                @elseif($complain->is_improvement == "belum")
                                    <b>Belum Ditindaklanjuti</b> <br> sisa waktu : 
                                    <div data-countdown="{{ $complain->end_time }}" style="display: inline">
                                        <li style="display: inline" data-days="00">00</li>
                                        <li style="display: inline" data-hours="00">00</li>
                                        <li style="display: inline" data-minuts="00">00</li>
                                        <li style="display: inline" data-seconds="00">00</li>
                                    </div>
                                @endif

                            </td>
                            <td> 
                                <a href="{{ route('complain-inbox.edit', $complain->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('complain-inbox.show', $complain->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ( $complain->is_improvement == 'sudah')
                                <form action="{{ route('complain-inbox.destroy', $complain->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                                                          
                                @endif   
                            </td>
                            </tr>
                            @elseif ($complain->innovation_complain->users_id == Auth::user()->id)
                            <tr>
                            <td>{{ $j++ }}</td>
                            <td>{{ $complain->innovation_complain->name }}
                                
                            </td>
                            <td>{{ $complain->name }}</td>
                            <td>{{ $complain->subject }}</td>
                            <td>
                                @if ($complain->is_improvement == "sudah")
                                <i class="fa fa-check" aria-hidden="true"></i><b> Sudah Ditindaklanjuti</b>
                                @elseif($complain->is_improvement == "belum")
                                    <b>Belum Ditindaklanjuti</b> <br> sisa waktu : 
                                    <div data-countdown="{{ $complain->end_time }}" style="display: inline">
                                        <li style="display: inline" data-days="00">00</li>
                                        <li style="display: inline" data-hours="00">00</li>
                                        <li style="display: inline" data-minuts="00">00</li>
                                        <li style="display: inline" data-seconds="00">00</li>
                                    </div>
                                @endif                      

                            </td>
                            <td> 
                                <a href="{{ route('complain-inbox.edit', $complain->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('complain-inbox.show', $complain->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ( $complain->is_improvement == 'sudah')
                                <form action="{{ route('complain-inbox.destroy', $complain->id) }}" method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>                                  
                                @endif   
                            </td>
                        </tr>
                        @endif
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
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

                $dataDays.html('00');
                $dataHours.html('00');
                $dataMinuts.html('00');
                $dataSeconds.html('00');

            }



        }, 1000);
    })

</script>
@endpush