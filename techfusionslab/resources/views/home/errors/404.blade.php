@extends('home.home_master')
@section('home')
    <!-- GT Hero Section Start -->
    <div class="gt-breadcrumb-wrapper fix bg-cover"
        style="background-image: url({{ asset('frontend/assets/img/inner-page/breadcrumb/bg.jpg') }})">
        <div class="gt-right-shape">
            <img src="{{ asset('frontend/assets/img/inner-page/breadcrumb/shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="gt-page-heading">
                <div class="gt-arrow float-bob-x">
                    <img src="{{ asset('frontend/assets/img/inner-page/breadcrumb/arrow.png') }}" alt="img">
                </div>
                <div class="gt-star float-bob-y">
                    <img src="{{ asset('frontend/assets/img/inner-page/breadcrumb/star.png') }}" alt="img">
                </div>
                <div class="gt-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Error 404</h1>
                </div>
                <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>Error 404</li>
                </ul>
            </div>
        </div>
    </div>
         <section class="gt-error-section section-padding fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="gt-error-items">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">404</h2>
                            <h3 class="wow fadeInUp" data-wow-delay=".5s">
                                Page not Found
                            </h3>
                            <p class="wow fadeInUp" data-wow-delay=".3s">
                                Sorry, we couldnot find the page you are looking for
                            </p>
                            <a href="{{ route('home') }}" class="gt-theme-btn wow fadeInUp" data-wow-delay=".5s">
                                <span>GET STARTED <i class="fa-solid fa-arrow-right"></i></span>
                                <span>GET STARTED <i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
