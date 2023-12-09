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
            <div class="heading_container">
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
              </p>
              <div class="options ml-auto">
                <a href="{{ route('users.order') }}">
                    Beli Tiket
                </a>
            </div>
          </div>
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