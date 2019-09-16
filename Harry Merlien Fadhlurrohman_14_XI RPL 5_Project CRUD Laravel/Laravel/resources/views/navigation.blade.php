<nav class="navbar navbar-expand-lg bg-secondary text-uppercase top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../public/tempalate">Harry Template</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../public/homepage">Home</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../public/about">About</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../public/siswa">Siswa Tauladan</a>
            </li>

            <li class="nav-item mx-0 mx-lg-1 dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger dropdown-toggle">
                    Data Model<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" align="left" style="font-size: 15.5px; width: 105%;">
                    <li style="padding-bottom: 5px;" align="center">
                        <a style="text-decoration: none;" class="rounded js-scroll-trigger" href="../public/siswamodel">Siswa Model</a>
                    </li>
                    <li style="padding-bottom: 5px;" align="center">
                        <a style="text-decoration: none;" class="rounded js-scroll-trigger" href="../public/gurumodel">Guru Model</a>
                    </li>
                    <li style="padding-bottom: 5px;" align="center">
                        <a style="text-decoration: none;" class="rounded js-scroll-trigger" href="../public/kelasmodel">Kelas Model</a>
                    </li>
                    <li style="padding-bottom: 5px;" align="center">
                        <a style="text-decoration: none;" class="rounded js-scroll-trigger" href="../public/walikelasmodel">Walikelas Model</a>
                    </li>
                </ul>
            </li>

            @if(Session::has('user'))
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{URL::action('loginregistercontroller@logout')}}">Logout</a>
                </li>
            @else
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../public/login">Login</a>
                </li>
            @endif
            </ul>
        </div>
    </div>
</nav>