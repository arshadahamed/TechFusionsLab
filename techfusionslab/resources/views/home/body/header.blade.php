<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="header-left">
                    <div class="logo">
                        <a href="index.html" class="header-logo">
                            <img src="{{ asset('frontend/assets/img/logo/white-logo.png') }}" alt="logo-img">
                        </a>
                        <a href="index.html" class="header-logo-2">
                            <img src="{{ asset('frontend/assets/img/logo/white-logo.png') }}" alt="logo-img">
                        </a>
                    </div>
                </div>
                <div class="header-right d-flex align-items-center mt-0">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active menu-thumb">
                                        <a href="{{route('admin.login')}}">
                                            Home
                                        </a>
                                    </li>
                                    <li class="active d-xl-none">
                                        <a href="index.html" class="border-none">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="news-details.html">
                                            Team
                                        </a>
                                    </li>
                                    <li>
                                        <a href="service-details.html">
                                            Service
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                    @auth
                                        <li>
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{route('login')}}">Login</a>
                                        </li>
                                    @endauth


                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-call-item">
                        <div class="caller-button">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="content">
                                <span>Call for Inquiry</span>
                                <h3>
                                    <a href="tel:+0123456789">+0 123456789</a>
                                </h3>
                            </div>
                        </div>
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
