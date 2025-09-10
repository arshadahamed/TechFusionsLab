@php
    use App\Models\CompanyInfo;
    $company = CompanyInfo::first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- ========== Meta Tags ========== -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Arshad Ahamed">
        <meta name="description" content="{{ $company->meta_description ?? $company->description ?? 'Default Company Description' }}">
        <meta name="keywords" content="{{ $company->meta_keywords ?? 'tech, software, solutions' }}">

        <!-- ======== Page title ============ -->
        <title>{{ $company->meta_title ?? $company->company_name ?? 'Default Company Name' }}</title>

        <!-- Dynamic Favicon -->
        @if($company && $company->favicon)
            <link rel="shortcut icon" href="{{ asset('storage/'.$company->favicon) }}">
        @endif

        <!-- Open Graph (FB/LinkedIn) -->
        <meta property="og:title" content="{{ $company->meta_title ?? $company->company_name }}">
        <meta property="og:description" content="{{ $company->meta_description ?? $company->description }}">
        <meta property="og:image" content="{{ $company && $company->dark_logo ? asset('storage/'.$company->dark_logo) : asset('frontend/assets/img/default-og.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $company->meta_title ?? $company->company_name }}">
        <meta name="twitter:description" content="{{ $company->meta_description ?? $company->description }}">
        <meta name="twitter:image" content="{{ $company && $company->dark_logo ? asset('storage/'.$company->dark_logo) : asset('frontend/assets/img/default-twitter.png') }}">

        <!--<< Bootstrap min.css') }} >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <!--<< All Min Css >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/all.min.css') }}">
        <!--<< Animate.css')  >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
        <!--<< Magnific Popup.css') >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
        <!--<< MeanMenu.css') }} >>-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/meanmenu.css') }}">
        <!--<< Swiper Bundle.css') }} >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
        <!--<< Nice Select.css') }} >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
        <!--<< Main.css') }} >>-->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    </head>
    <body>


        <!-- Preloader Start -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="M" class="letters-loading">
                        M
                    </span>
                     <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        E
                    </span>
                    <span data-text-preloader="E" class="letters-loading">
                        R
                    </span>
                     <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                </div>
                <p class="text-center">Empowering Your Financial Growth</p>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- GT Back To Top Start -->
        <button id="gt-back-top" class="gt-back-to-top show">
            <i class="fa-regular fa-arrow-up"></i>
        </button>

        <!-- GT MouseCursor Start -->
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div>

        <!-- Offcanvas Area Start -->
        <div class="fix-area">
            <div class="offcanvas__info">
                <div class="offcanvas__wrapper">
                    <div class="offcanvas__content">
                        <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                            <div class="offcanvas__logo">
                                <a href="index.html">
                                    <img src="{{ asset('frontend/assets/img/logo/black-logo.png') }}" alt="logo-img">
                                </a>
                            </div>
                            <div class="offcanvas__close">
                                <button>
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <p class="text d-none d-xl-block">
                            {{ $company->description ?? 'Default Company Description' }}
                        </p>
                        <div class="mobile-menu fix mb-3"></div>
                        <div class="offcanvas__contact d-xl-block">
                            <h4 class="d-xl-block">Contact Info</h4>
                            <ul class="d-xl-block">
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">{{ $company->address ?? 'Default Company Address' }}</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="mailto:info@moderntrading.co.uk"><span class="mailto:info@moderntrading.co.uk">{{$company->email_one ?? 'Default Email'}}</span></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a target="_blank" href="#">Mod-friday, 09am -05pm</a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div class="offcanvas__contact-icon mr-15">
                                        <i class="far fa-phone"></i>
                                    </div>
                                    <div class="offcanvas__contact-text">
                                        <a href="tel:{{ $company->phone_one ?? 'Default Phone Number' }}">{{ $company->phone_one ?? 'Default Phone Number' }}</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="social-icon d-flex align-items-center">
                                <a href="{{ $company->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $company->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $company->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a>
                                <a href="{{ $company->linkedin ?? '#' }}"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas__overlay"></div>

        <!-- Header Section Start -->
        @include('home.body.header')

        @yield('home')
        <!-- Gt-Footer Section Start -->
        @include('home.body.footer')

        <!--<< All JS Plugins >>-->
        <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js ') }}"></script>
        <!--<< Viewport Js >>-->
        <script src="{{ asset('frontend/assets/js/viewport.jquery.js ') }}"></script>
        <!--<< Bootstrap Js >>-->
        <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js ') }}"></script>
        <!--<< nice-selec Js >>-->
        <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js ') }}"></script>
        <!--<< Waypoints Js >>-->
        <script src="{{ asset('frontend/assets/js/jquery.waypoints.js ') }}"></script>
        <!--<< Counterup Js >>-->
        <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js ') }}"></script>
        <!--<< Swiper Slider Js >>-->
        <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js ') }}"></script>
        <!--<< MeanMenu Js >>-->
        <script src="{{ asset('frontend/assets/js/jquery.meanmenu.min.js ') }}"></script>
        <!--<< Magnific Popup Js >>-->
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js ') }}"></script>
        <!--<< Wow Animation Js >>-->
        <script src="{{ asset('frontend/assets/js/wow.min.js ') }}"></script>
         <!--<< gsap Js >>-->
        <script src="{{ asset('frontend/assets/js/gsap.js ') }}"></script>
         <!--<< scroll-trigger Js >>-->
         <script src="{{ asset('frontend/assets/js/scroll-trigger.js ') }}"></script>
        <!--<< Main.js ') }} >>-->
        <script src="{{ asset('frontend/assets/js/main.js ') }}"></script>
    </body>
</html>



