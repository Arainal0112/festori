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
            <img src="{{asset('images/event/event1.jpg')}}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Ngobrolin Kerja di BUMN
              </h2>
            </div>
            <span>
                " TAHU LEBIH & LEBIH TAHU "
            </span>
            <p>
                Sabtu, 28 Oktober 2023
            </p>
            <div class="options">
                <h6>
                    Gratis
                </h6>
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