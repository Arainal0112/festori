<div class="hero_area">
    <div class="bg-box">
        <img src="{{ asset('images/h-bg.png') }}" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
                    <span>
                        Festoris
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mx-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.event') }}">Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.riwayat') }}">Riwayat</a>
                        </li>

                    </ul>
                    <div class="user_option">

                        @guest
                            <!-- Tombol untuk pengguna yang belum login -->
                            <a href="{{ route('login') }}" class="order_online">Login</a>
                        @else
                        <div class="dropdown" id="userDropdown">
                            <a href="#" class="order_online">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span> {{ auth()->user()->name }}</span>
                            </a>
                            <div class="dropdown-content" id="dropdownContent">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <!-- Tambahkan item dropdown lainnya jika diperlukan -->
                            </div>
                        </div>
                        
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
