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
            <li data-filter=".burger">Music</li>
            <li data-filter=".fest">Fest</li>
            <li data-filter=".pasta">Education</li>
        </ul>

        <div class="filters-content">
            <div class="row grid">
                <div class="col-sm-6 col-lg-4 all fest">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('images/event/event1.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Ngobrolin Kerja di BUMN
                                </h5>
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
                                    <a href="{{route('users.detail')}}">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    $(document).ready(function () {
        // Ubah class body menjadi sub_page
        $('body').addClass('sub_page');
    });
</script>
  
@endsection