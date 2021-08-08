<!-- Header -->
<header class="header">
    <!-- Topbar -->
    <div class="topbar p-3">

    </div>
    <!--/ End Topbar -->

    <!-- Middle Header -->
    <div class="middle-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="middle-inner">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-12">
                                <!-- Logo -->
                                <div class="logo">
                                    <!-- Image Logo -->
                                    <div class="img-logo">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ url('front/img/logo-sgu.png') }}" width="45" alt="#">
                                        </a>
                                    </div>
                                </div>
                                <div class="mobile-nav"></div>
                            </div>
                            <div class="col-lg-10 col-md-9 col-12">
                                <div class="menu-area">
                                    <!-- Main Menu -->
                                    <nav class="navbar navbar-expand-lg">
                                        <div class="navbar-collapse">
                                            <div class="nav-inner">
                                                <div class="menu-home-menu-container">
                                                    <!-- Naviagiton -->
                                                    <ul id="nav" class="nav main-menu menu navbar-nav">
                                                        <li class="{{ request()->is('/') ?'active' : '' }}">
                                                            <a href="{{ route('home') }}">Home</a>
                                                        </li>
                                                        <li class="{{ request()->is('infographic') || request()->is('infographic-detail') ?'active' : '' }}">
                                                            <a href="{{ route('infographic') }}">Infografis</a>
                                                        </li>
                                                        <li class="{{ request()->is('complain') ?'active' : '' }}">
                                                            <a href="{{ route('complain.index') }}">Pengaduan</a></li>
                                                        <li class="{{ request()->is('about') ?'active' : '' }}">
                                                            <a href="{{ route('about') }}">Tentang Kami</a>
                                                        </li>
                                                        @guest
                                                        <li><a href="/login">Login/Register</a></li>
                                                        @endguest
                                                        @auth
                                                        <li><a href="/admin">Admin</a></li>
                                                        <li>
                                                            <form action="{{ url('logout') }}" method="POST">
                                                                @csrf
                                                                <a><button type="submit">
                                                                        Keluar
                                                                    </button></a>
                                                            </form>
                                                        </li>
                                                        @endauth
                                                    </ul>
                                                    <!--/ End Naviagiton -->
                                                </div>
                                            </div>
                                        </div>
                                    </nav>
                                    <!--/ End Main Menu -->
                                    <!-- Right Bar -->
                                    <div class="right-bar">
                                        <!-- Search Bar -->
                                        <ul class="right-nav" style="margin-left: 20px;">
                                            <li class="top-search"><a href="#0"><i class="fa fa-search"></i></a>
                                            </li>

                                        </ul>
                                        <!--/ End Search Bar -->
                                        <!-- Search Form -->
                                        <div class="search-top">
                                            <form action="#" class="search-form" method="get">
                                                <input type="text" name="s" value="" placeholder="Search here" />
                                                <button type="submit" id="searchsubmit"><i
                                                        class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                        <!--/ End Search Form -->
                                    </div>
                                    <!--/ End Right Bar -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Middle Header -->
    <!-- Sidebar Popup -->
    <div class="sidebar-popup">

    </div>
    <!--/ Sidebar Popup -->
</header>
<!--/ End Header -->