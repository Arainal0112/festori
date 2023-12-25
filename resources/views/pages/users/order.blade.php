@extends('layouts.user')

@section('content')
<!-- event section -->
</div>
 <!-- about section -->

 <section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Beli Tiket
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form_container">
                    <form action="">
                        <div>
                            <label for="">Nama Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Nama Kegiatan" />
                        </div>
                        <div>
                            <label for="">Tema Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Tema" />
                        </div>
                        <div>
                            <label for="">Nama Kegiatan</label>
                            <input type="email" class="form-control" placeholder="Your Email" />
                        </div>
                        <div>
                            <label for="">Tanggal Pelaksanaan Kegiatan</label>
                            <input type="date" class="form-control">
                        </div>
                        <div>
                            <label for="">Durasi Iklan </label>
                            <select class="form-control nice-select wide">
                                <option value="">
                                    Selalu
                                </option>
                                <option value="">
                                    1 Minggu
                                </option>
                                <option value="">
                                    1 Bulan
                                </option>
                            </select>
                        </div>
                        <div class="btn_box">
                            <button>
                                Book Now
                            </button>
                        </div>
                        
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
@endsection