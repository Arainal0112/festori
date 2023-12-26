@extends('layouts.user')

@section('content')
    <!-- event section -->
    </div>
    <section class="event_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Transaksi Saya
                </h2>
            </div>

            <div class="tiket">
                @foreach ($transaksi as $Trans)
                    @if ($Trans->id_user == Auth::id())
                        <div class="item">
                            <div class="item-right">
                                <h2 class="num">{{ $Trans->jumlah }}</h2>
                                <p class="day">Tiket</p>
                                <span class="up-border"></span>
                                <span class="down-border"></span>
                            </div> <!-- end item-right -->

                            <div class="item-left">
                                <p>{{ $Trans->created_at }}</p>
                                <p class="event">{{ $Trans->tiket->event->kategori->nama_kategori }}</p>
                                <h2 class="title">{{ $Trans->tiket->event->nama_event }}</h2>

                                <div class="sce">
                                    <div class="icon">
                                        <i class="fa fa-table"></i>
                                    </div>
                                    <p>{{ \Carbon\Carbon::parse($Trans->tiket->event->tanggal_event)->format('d F Y') }}<br />
                                        {{ $Trans->tiket->event->waktu }}</p>
                                </div>
                                <div class="fix"></div>
                                <div class="loc">
                                    <div class="icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <p>{{ $Trans->tiket->event->lokasi }}</p>
                                </div>
                                
                            </div> <!-- end item-right -->
                        </div> <!-- end item -->
                    @endif
                @endforeach
            </div>

            {{-- <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-items-center" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Waktu Pembelian</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        @foreach ($transaksi as $Trans)
                            @if ($Trans->id_user == Auth::id())
                                <!-- Filter Trans berdasarkan id_userTrans -->
                                <tbody>
                                    <tr>
                                        <td class="text-center col-1">{{ $i }}</td>
                                        <td>{{ $Trans->tiket->event->nama_event }}</td>
                                        <td>{{ $Trans->jumlah }}</td>
                                        <td>{{ $Trans->total }}</td>
                                        <td>{{ $Trans->created_at }}</td>
                                    </tr>
                                </tbody>
                                <?php $i++; ?>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div> --}}
            {{-- </div>
        </div> --}}
    </section>

    <!-- end event section -->
    <script>
        $(document).ready(function() {
            // Ubah class body menjadi sub_page
            $('body').addClass('sub_page');
        });
    </script>
@endsection
