<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">

                <!-- Header Left: Logos -->
                <div class="header-left">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="header-logo">
                            <img src="{{ $company->white_logo ? asset($company->white_logo) : asset('frontend/assets/img/logo/white-logo.png') }}"
                                 alt="White Logo">
                        </a>
                        <a href="{{ route('home') }}" class="header-logo-2">
                            <img src="{{ $company->dark_logo ? asset($company->dark_logo) : asset('frontend/assets/img/logo/black-logo.png') }}"
                                 alt="Dark Logo">
                        </a>
                    </div>
                </div>

                <!-- Header Right: Menu & Contact -->
                <div class="header-right d-flex align-items-center mt-0 ms-4">

                    <!-- Main Menu -->
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active menu-thumb">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="active d-xl-none">
                                        <a href="{{ route('home') }}" class="border-none">Home</a>
                                    </li>
                                    <li><a href="">About Us</a></li>
                                    <li><a href="">Team</a></li>
                                    <li><a href="{">Service</a></li>
                                    <li><a href="">Contact Us</a></li>
                                    @auth
                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Call Button -->
                    <div class="header-call-item">
                        <div class="caller-button">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="content">
                                <span>Call for Inquiry</span>
                                <h3>
                                    <a href="tel:{{ $company->phone_one }}">{{ $company->phone_one }}</a>
                                    @if($company->phone_two)
                                        <span> / <a href="tel:{{ $company->phone_two }}">{{ $company->phone_two }}</a></span>
                                    @endif
                                </h3>
                            </div>
                        </div>

                        <!-- Hamburger for Mobile -->
                        <div class="header__hamburger my-auto">
                            <div class="sidebar__toggle">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
