@extends('layouts.user')

@section('content')
<!-- event section -->
</div>
 <!-- about section -->

 <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="{{asset('images/event/'. $event->foto_event)}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            {{-- <div class="heading_container">
              <h2>
                {{$event->nama_event}}
              </h2>
            </div>
            <span>
              {{$event->deskripsi_event}}
            </span>
            <div>
              <p class="m-0 mt-2">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                  <span class="ml-2">{{$event->tanggal_event}}</span>
              </p>
              <p class="m-0">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                  <span class="ml-2">{{$event->waktu}}</span>
              </p> --}}
              <div class="card shadow mb-4">
                <div class="card-profile-image mt-4" style="text-align: center;">
                  <h1 style="color: black;">{{$event->nama_event}}</h1>
                  <hr>
                </div>
                <div class="card-body">
    
                    <div class="row">
                      <div class="col-lg-12">
                        <h6 style="color: black;">Deskripsi :</h6>
                        <h5 class="font-weight-bold" style="color: black;">{{$event->deskripsi_event}}</h5>
                        <h6 style="color: black;">Lokasi :</h6>
                        <h5 class="font-weight-bold" style="color: black;">{{$event->lokasi}}</h5>
                        <h6 style="color: black;">Waktu :</h6>
                        <h5 class="font-weight-bold" style="color: black;">{{$event->waktu}}</h5>
                        <h6 style="color: black;">Tanggal :</h6>
                        <h5 class="font-weight-bold" style="color: black;">{{$event->tanggal_event}}</h5>
                        <h6 style="color: black;">Harga :</h6>
                        @foreach($event->tiket as $tiket)
                            <h5 class="font-weight-bold" style="color: black;">Rp. {{$tiket->harga_tiket}}</h5>
                        @endforeach
                    </div>
                    </div>               
                </div>
            </div>
              {{-- <div class="options ml-auto">
                <a href="{{ route('users.order') }}">
                    Beli Tiket
                </a>
            </div> --}}
            <div class="card mt-4">
              <div class="card-body">         
                  <!-- Tombol Tambah dan Kurang Tiket -->
                  <div class="row mt-3">
                    <div class="col-md-3">
                        <h5 id="jumlahTiket" class="font-weight-bold text-center" style="color: black;">0</h5>
                    </div>
                    <div class="mt-3">
                      <h6 style="color: black;">Total Harga Tiket :</h6>
                      <h5 id="totalHarga" class="font-weight-bold" style="color: black;">Rp. 0</h5>
                  </div>
                    <div class="col-md-3">
                        <button class="btn btn-custom" onclick="kurangTiket()">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-custom" onclick="tambahTiket()">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-custom btn-block mt-3" onclick="tampilkanModalKonfirmasi()">
                            Beli Tiket
                        </a>
                    </div>
                </div>
                </div>
              </div>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pembelian Tiket</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <p style="color: black;">Jumlah Tiket: <span id="modalJumlahTiket">0</span></p>
                  <p style="color: black;">Total Harga: Rp <span id="modalTotalHarga">0</span></p>
                  <p style="color: black;">Silakan konfirmasi pembayaran.</p>
              </div>
              <div class="modal-footer">
                <form id="konfirmasiForm" action="{{ route('users.transaksi.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_tiket" value="{{ $event->tiket->first()->id }}">
                    <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="jumlah" id="jumlahInput" value="0">
                    <input type="hidden" name="total" id="totalHargaInput" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-custom">Konfirmasi Pembayaran</button>
                </form>
            </div>
          </div>
      </div>
  </div>
  

  </section>
  <script>
    $(document).ready(function () {
        // Ubah class body menjadi sub_page
        $('body').addClass('sub_page');
    });
</script>
<script>
  let jumlahTiket = 0;
  const hargaTiket = {{$tiket->harga_tiket}}; // Mengambil harga tiket dari variabel PHP

  // Fungsi untuk menambah jumlah tiket
  function tambahTiket() {
      jumlahTiket++;
      updateJumlahTiket();
      updateTotalHarga();
  }

  // Fungsi untuk mengurangi jumlah tiket
  function kurangTiket() {
      if (jumlahTiket > 0) {
          jumlahTiket--;
          updateJumlahTiket();
          updateTotalHarga();
      }
  }

  // Fungsi untuk memperbarui tampilan jumlah tiket
  function updateJumlahTiket() {
      document.getElementById("jumlahTiket").innerText = jumlahTiket;

      document.getElementById("jumlahInput").value = jumlahTiket;
  }

  // Fungsi untuk memperbarui tampilan total harga  
  function updateTotalHarga() {
        const totalHarga = jumlahTiket * hargaTiket;
        const formattedTotalHarga = formatRupiah(totalHarga);
        document.getElementById("totalHarga").innerText = `Rp. ${formattedTotalHarga}`;

        document.getElementById("totalHargaInput").value = totalHarga;
    }
</script>
<script>
  // Fungsi untuk menampilkan jumlah tiket dan total harga pada modal
  function tampilkanModalKonfirmasi() {
      document.getElementById("modalJumlahTiket").innerText = jumlahTiket;
      document.getElementById("modalTotalHarga").innerText = formatRupiah(jumlahTiket * hargaTiket);
      $('#konfirmasiModal').modal('show'); // Menampilkan modal
  }

  // Fungsi untuk mengonversi angka menjadi format rupiah
  function formatRupiah(angka) {
      var reverse = angka.toString().split('').reverse().join(''),
          ribuan = reverse.match(/\d{1,3}/g);
      ribuan = ribuan.join('.').split('').reverse().join('');
      return ribuan;
  }
</script>
@endsection