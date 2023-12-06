@extends('layouts.user')

@section('content')
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Festori
                                    </h1>
                                    <p>
                                        Info seputar event
                                    </p>
                                    {{-- <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 ">
                                <div class="img-box">
                                    <img src="{{ asset('images/slide1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fast event Restaurant
                                    </h1>
                                    <p>
                                        Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                        mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                        labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 ">
                                <div class="img-box">
                                    <img src="{{ asset('images/slide1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fast event Restaurant
                                    </h1>
                                    <p>
                                        Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                        mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                        labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Order Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-6 ">
                                <div class="img-box">
                                    <img src="{{ asset('images/slide1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>

    </section>
    <!-- end slider section -->
    </div>

    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        News
                    </h2>
                </div>
                <div class="row">
                    @foreach ($latestEvent as $last)
                        
                    <div class="col-md-6 ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="{{ asset('images/event/' . $last->foto_event) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    {{$last->nama_event}}
                                    </h5>
                                    <span>
                                        {{$last->deskripsi_event}}
                                    </span>
                                    <div>
                                        <p class="m-0 mt-2">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span class="ml-2">{{$last->tanggal_event}}</span>
                                        </p>
                                        <p class="m-0">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span class="ml-2">{{$last->waktu}}</span>
                                        </p>
                                    </div>
                                
                                <a href="{{ route('users.detail-event', $last->id) }}">
                                    Info Lengkap
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- end offer section -->

    <!-- event section -->

    <section class="event_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Category
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                @foreach ($kategori as $Kategori)
                <li data-filter=".{{$Kategori->nama_kategori}}">{{$Kategori->nama_kategori}}</li>
                @endforeach
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    @foreach ($event as $Event)
                    <div class="col-sm-6 col-lg-4 all {{$Event->kategori->nama_kategori}}">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="{{ asset('images/event/' . $Event->foto_event) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                    {{$Event->nama_event}}
                                    </h5>
                                    <span>
                                        {{$Event->deskripsi_event}}
                                    </span>
                                    <div>
                                        <p class="m-0 mt-2">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <span class="ml-2">{{$Event->tanggal_event}}</span>
                                        </p>
                                        <p class="m-0">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <span class="ml-2">{{$Event->waktu}}</span>
                                        </p>
                                    </div>
                                    <div class="options ml-auto">
                                        <a href="{{ route('users.detail-event', $Event->id) }}">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div>
        </div>
    </section>

    <!-- end event section -->


    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Pasang Iklan
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="map_container ">
                        
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.504444128507!2d112.61309347414068!3d-7.9467082791628245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1701563222665!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    {{-- <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    What Says Our Customers
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                </p>
                                <h6>
                                    Moana Michell
                                </h6>
                                <p>
                                    magna aliqua
                                </p>
                            </div>
                            <div class="img-box">
                                <img src="images/client1.jpg" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                </p>
                                <h6>
                                    Mike Hamell
                                </h6>
                                <p>
                                    magna aliqua
                                </p>
                            </div>
                            <div class="img-box">
                                <img src="images/client2.jpg" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
