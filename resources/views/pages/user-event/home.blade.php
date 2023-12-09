@extends('layouts.user-event')

@section('main-content')
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> --}}

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <section class="offer_section layout_padding-bottom">
            <div class="offer_container">
                <div class="container ">
                    <div class="row">
                        @foreach ($latestEvent as $eventIndex => $last)
                            @if ($last->id_userEvent == Auth::id()) <!-- Filter event berdasarkan id_userEvent -->
                                <div class="col-md-6 ">
                                    <div class="box ">
                                        <div class="img-box">
                                            <img src="{{ asset('images/event/' . $last->foto_event) }}" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h5>{{ $last->nama_event }}</h5>
                                            <span>{{ $last->deskripsi_event }}</span>
                                            <div>
                                                <p class="m-0 mt-2">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <span class="ml-2">{{ $last->tanggal_event }}</span>
                                                </p>
                                                <p class="m-0">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    <span class="ml-2">{{ $last->waktu }}</span>
                                                </p>
                                            </div>
                                            <!-- Jumlah Tiket dan Harga Tiket -->
                                            <p class="m-0">
                                                <strong>Jumlah Tiket:</strong>
                                                <span class="ml-2"><strong>{{ $last->tiket->isNotEmpty() ? $last->tiket->first()->jumlah_tiket : 0 }}</strong></span>
                                            </p>
                                            <p class="m-0">
                                                <strong>Harga Tiket:</strong>
                                                <span class="ml-2"><strong>{{ $last->tiket->isNotEmpty() ? $last->tiket->first()->harga_tiket : 0 }}</strong></span>
                                            </p>
                                            <!-- Button Trigger Modal -->
                                            <button type="button" class="btn btn-primary kelola-tiket-btn" data-toggle="modal" 
                                                    @if ($last->tiket->count() > 0) 
                                                        data-target="#editTiketModal_{{ $eventIndex }}" 
                                                        data-jumlah-tiket="{{ $last->tiket->first()->jumlah_tiket }}"
                                                        data-harga-tiket="{{ $last->tiket->first()->harga_tiket }}"
                                                        data-tiket-id="{{ $last->tiket->first()->id }}"
                                                    @else
                                                        data-target="#kelolaTiketModal" 
                                                    @endif
                                                    data-event-id="{{ $last->id }}">
                                                @if ($last->tiket->count() > 0) 
                                                    Edit Tiket
                                                @else
                                                    Kelola Tiket
                                                @endif
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Form Kelola Tiket -->
    <div class="modal fade" id="kelolaTiketModal" tabindex="-1" role="dialog" aria-labelledby="kelolaTiketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kelolaTiketModalLabel">Kelola Tiket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tiket Form -->
                    <form action="{{ route('tiket.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_event" id="kelola_id_event" value="">
                        <div class="form-group">
                            <label for="kelola_jumlah_tiket">Jumlah Tiket</label>
                            <input type="number" class="form-control" id="kelola_jumlah_tiket" name="jumlah_tiket" required>
                        </div>
                        <div class="form-group">
                            <label for="kelola_harga_tiket">Harga Tiket</label>
                            <input type="number" class="form-control" id="kelola_harga_tiket" name="harga_tiket" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Tiket</button>
                    </form>
                    <!-- End Tiket Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Form Edit -->
    @foreach ($latestEvent as $eventIndex => $last)
        <div class="modal fade" id="editTiketModal_{{ $eventIndex }}" tabindex="-1" role="dialog" aria-labelledby="editTiketModalLabel_{{ $eventIndex }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTiketModalLabel_{{ $eventIndex }}">Edit Tiket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Tiket Form Edit -->
                        @if ($last->tiket->isNotEmpty())
                            <form action="{{ route('tiket.update', ['tiket' => $last->tiket->first()->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="edit_jumlah_tiket">Jumlah Tiket</label>
                                    <input type="number" class="form-control" id="edit_jumlah_tiket" name="jumlah_tiket" required>
                                </div>
                                <div class="form-group">
                                    <label for="edit_harga_tiket">Harga Tiket</label>
                                    <input type="number" class="form-control" id="edit_harga_tiket" name="harga_tiket" required>
                                </div>
                                <input type="hidden" name="id_event" id="edit_id_event" value="{{ $last->id }}">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form>
                        @else
                            <p>Tidak ada tiket untuk diedit.</p>
                        @endif
                        <!-- End Tiket Form Edit -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

<!-- JavaScript Script -->
<!-- JavaScript Script -->
<script>
    $(document).ready(function() {
        // Menangkap event tampil modal edit
        $('.modal').on('show.bs.modal', function(event) {
            var modal = $(this);
            var button = $(event.relatedTarget); // Tombol yang memicu modal

            // Mengatur nilai pada label berdasarkan data yang ada pada tombol yang memicu modal
            var jumlahTiket = button.data('jumlah-tiket');
            var hargaTiket = button.data('harga-tiket');

            // Mengatur nilai pada label di dalam modal
            modal.find('.modal-title #edit_jumlah_tiket_label').text(jumlahTiket);
            modal.find('.modal-title #edit_harga_tiket_label').text(hargaTiket);

            // Mengatur nilai input untuk jumlah_tiket dan harga_tiket pada form di dalam modal
            modal.find('#edit_jumlah_tiket').val(jumlahTiket);
            modal.find('#edit_harga_tiket').val(hargaTiket);

            // Debugging: Cetak nilai pada konsol
            console.log('Jumlah Tiket:', jumlahTiket);
            console.log('Harga Tiket:', hargaTiket);
        });

        // Menangkap event klik pada tombol yang memicu modal kelola tiket
        $('.kelola-tiket-btn').on('click', function(event) {
            var button = $(this);
            var eventId = button.data('event-id');

            // Mengatur nilai input hidden di dalam modal kelola tiket
            $('#kelola_id_event').val(eventId);

            // Mengosongkan nilai input pada modal edit tiket
            $('#edit_jumlah_tiket').val('');
            $('#edit_harga_tiket').val('');
        });

        // Menangkap event klik pada tombol yang memicu modal edit
        $('.kelola-tiket-btn').on('click', function(event) {
            var button = $(this);
            var eventId = button.data('event-id');
            var jumlahTiket = button.data('jumlah-tiket');
            var hargaTiket = button.data('harga-tiket');

            // Debugging: Cetak nilai eventId ke konsol
            console.log('Event ID:', eventId);

            // Mengatur nilai input hidden di dalam modal edit
            $('#edit_id_event').val(eventId);

            // Mengatur nilai input untuk jumlah_tiket dan harga_tiket pada modal edit
            $('#edit_jumlah_tiket').val(jumlahTiket);
            $('#edit_harga_tiket').val(hargaTiket);
        });
    });
</script>



    
@endsection
