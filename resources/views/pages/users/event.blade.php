@extends('layouts.user')

@section('content')
<!-- event section -->
</div>
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
                                    {!! Str::words($Event->deskripsi_event, 5, ' ...')!!}
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
    </div>
</section>

<!-- end event section -->
<script>
    $(document).ready(function () {
        // Ubah class body menjadi sub_page
        $('body').addClass('sub_page');
    });
</script>
  
@endsection