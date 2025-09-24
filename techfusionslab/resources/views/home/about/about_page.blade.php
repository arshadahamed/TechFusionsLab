@extends('home.home_master')
@section('home')
    @php
        use App\Models\CompanyInfo;
        $company = CompanyInfo::first();
    @endphp

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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">About Us</h1>
                </div>
                <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="about-section-1 section-padding fix bg-cover"
        style="background-image: url({{ asset('frontend/assets/img/home-1/about/about-bg.jpg') }});">
        <div class="container">
            <div class="gt-about-wrapper">
                <div class="row g-4 align-items-center">

                    <!-- Left Image -->
                    <div class="col-lg-6">
                        <div class="gt-about-image wow img_full img_left_animation">
                            <img src="{{ asset('frontend/assets/img/home-1/about/about-3.png') }}" alt="About Us Image"
                                class="img-fluid">
                            <div class="gt-shape">
                                <img src="{{ asset('frontend/assets/img/home-1/about/shape-2.png') }}" alt="Shape"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-6">
                        <div class="gt-about-content">
                            <div class="gt-section-title mb-3">
                                <span class="gt-sub-title wow fadeInUp">
                                    <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="icon"> ABOUT
                                    US
                                </span>
                                <h2 class="wow fadeInUp" data-wow-delay=".3s">Why Choose Us?</h2>
                            </div>

                            <p class="gt-text wow fadeInUp" data-wow-delay=".5s">
                                Pluto Consultancy Ltd is a London-based accountancy service provider for small and
                                medium-sized businesses. Our qualified professionals work closely with you to build and
                                manage your finance function smoothly, allowing you to focus on your core business while
                                receiving the right financial advice. Your trusted partner for seamless accountancy
                                solutions.
                            </p>

                            <!-- Features Grid -->
                            <div class="row g-4 mt-4">
                                <!-- Customer Care & Quick Responses -->
                                <div class="col-md-6">
                                    <div class="gt-icon-item d-flex wow fadeInUp" data-wow-delay=".3s">
                                        <div class="gt-icon me-3">
                                            <img src="{{ asset('frontend/assets/img/home-1/icon/17.svg') }}" alt="icon">
                                        </div>
                                        <div class="content">
                                            <h4>Customer Care & Quick Responses</h4>
                                            <p>We value our clients and ensure prompt attention to their queries and
                                                business matters. We complete work efficiently and on time.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Client Relationship -->
                                <div class="col-md-6">
                                    <div class="gt-icon-item d-flex wow fadeInUp" data-wow-delay=".5s">
                                        <div class="gt-icon me-3">
                                            <img src="{{ asset('frontend/assets/img/home-1/icon/18.svg') }}"
                                                alt="icon">
                                        </div>
                                        <div class="content">
                                            <h4>Strong Client Relationships</h4>
                                            <p>Our professionals are easily accessible and engage regularly with clients to
                                                understand their business, offer better advice, and deliver greater value.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Competitive Fees -->
                                <div class="col-md-6">
                                    <div class="gt-icon-item d-flex wow fadeInUp" data-wow-delay=".7s">
                                        <div class="gt-icon me-3">
                                            <img src="{{ asset('frontend/assets/img/home-1/icon/19.svg') }}"
                                                alt="icon">
                                        </div>
                                        <div class="content">
                                            <h4>Transparent & Competitive Fees</h4>
                                            <p>We ensure clients understand how fees are calculated, offering fixed/flexible
                                                fees and free telephone support. No unexpected bills.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="gt-about-button-item mt-4 wow fadeInUp" data-wow-delay=".3s">
                                <a href="about.html" class="gt-theme-btn">
                                    <span>MORE ABOUT <i class="fa-solid fa-arrow-right"></i></span>
                                    <span>MORE ABOUT <i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                                <span class="button-text">
                                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                                        <i class="fa-solid fa-play"></i>
                                    </a>
                                    <span class="ms-3">Check Intro <br> Video</span>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>




    <!-- GT Why-Choose-Us Section Start -->
    <section class="gt-why-choose-us-section section-padding fix bg-cover"
        style="background-image: url({{ asset('frontend/assets/img/home-1/choose-us/bg.jpg') }});">
        <div class="container">
            <div class="gt-why-choose-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="gt-why-choose-us-image wow img_full img_left_animation">
                            <img src="{{ asset('frontend/assets/img/home-1/choose-us/02.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="gt-why-choose-us-content">
                            <div class="gt-section-title mb-0">
                                <span class="gt-sub-title style-2 wow fadeInUp">
                                    <img src="{{ asset('frontend/assets/img/home-1/icon/01.svg') }}" alt="img"> Driven
                                    by Your Success
                                </span>
                                <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                                    Trusted Guidance, <br> Proven Results
                                </h2>
                            </div>
                            <div class="gt-text wow fadeInUp" data-wow-delay=".5s">
                                Pluto Consultancy Ltd is a London based accountancy service provider for small and medium
                                sized businesses. Our qualified professionals will be working very closely with you to build
                                and manage your finance function as smoothly as possible, allowing you to focus on your core
                                business while also providing you the right financial advice.
                                Your trusted partner for seamless accountancy solutions.
                            </div>
                            <div class="gt-why-choose-us-item">
                                <div class="gt-chosse-us-icon-item">
                                    <div class="gt-chosse-us-icon wow fadeInUp" data-wow-delay=".3s">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/assets/img/home-1/icon/19.svg') }}"
                                                alt="img">
                                        </div>
                                        <div class="content">
                                            <h4>Certified & Experienced <br> Advisors</h4>
                                        </div>
                                    </div>
                                    <div class="gt-chosse-us-icon mb-0 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/assets/img/home-1/icon/20.svg') }}"
                                                alt="img">
                                        </div>
                                        <div class="content">
                                            <h4>Certified & <br> Experienced Advisors</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="gt-arrow">
                                    <img src="{{ asset('frontend/assets/img/home-1/choose-us/arrow.png') }}"
                                        alt="img">
                                </div>
                            </div>
                            <div class="gt-choose-us-button wow fadeInUp" data-wow-delay=".3s">
                                <a href="{{ route('about') }}" class="gt-theme-btn">
                                    <span>READ MORE <i class="fa-solid fa-arrow-right"></i></span>
                                    <span>READ MORE <i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                                <div class="gt-count-item">
                                    <h2><span class="gt-count">20</span></h2>
                                    <p>
                                        + Years <br> experience
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        use App\Models\Team;
        $teams = Team::where('status', 'active')->get();
    @endphp
    <section class="gt-team-section-3 section-padding fix bg-cover"
        style="background-image: url({{ asset('frontend/assets/img/home-3/team/bg.jpg') }})">
        <div class="container">
            <div class="gt-section-title text-center">
                <span class="gt-sub-title wow fadeInUp">
                    <i class="fa-regular fa-star"></i> OUR TEAM OF CONSULTANTS <i class="fa-regular fa-star"></i>
                </span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Meet Our Marketing Experts
                </h2>
            </div>
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="gt-team-card-items-3 wow img-custom-anim" data-wow-duration="1.3s"
                            data-wow-delay="0.3s">
                            <div class="gt-team-image">
                                <img src="{{ asset('storage/'.$team->image ?? 'frontend/assets/img/home-3/team/default.jpg') }}"
                                    alt="{{ $team->name }}">
                            </div>
                            <div class="gt-team-content">
                                <h4>{{ $team->name }}</h4>
                                <p>{{ $team->position }}</p>
                                <div class="gt-social-icon">
                                    @if ($team->twitter)
                                        <a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>
                                    @endif
                                    @if ($team->youtube)
                                        <a href="{{ $team->youtube }}"><i class="fa-brands fa-youtube"></i></a>
                                    @endif
                                    @if ($team->instagram)
                                        <a href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                    @endif
                                    @if ($team->facebook)
                                        <a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="gt-testimonial-section section-padding fix bg-cover"
        style="background-image: url({{ asset('frontend/assets/img/home-1/testimonial/bg-2.jpg') }});">
        <div class="container">
            <div class="gt-section-title text-center">
                <span class="gt-sub-title wow fadeInUp">
                    <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img"> Client Testimonials
                    <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img">
                </span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    What Our Clients Say
                </h2>
            </div>
            <div class="gt-testimonial-wrapper">
                <div class="row g-4">
                    <!-- Left -->
                    <div class="col-xl-3 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                        <div class="gt-testimonial-left">
                            <div class="gt-info-item">
                                <div class="client-image">
                                    <img src="{{ asset('frontend/assets/img/home-1/testimonial/client-2.png') }}"
                                        alt="img">
                                </div>
                                <button class="array-prev">PREV <i class="fa-solid fa-arrow-left"></i></button>
                            </div>
                        </div>
                    </div>

                    <!-- Center (Slider) -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="gt-testimonial-bg">
                            <div class="swiper gt-testimonial-slider-2">
                                <div class="swiper-wrapper">
                                    @php
                                        $reviews = App\Models\Review::latest()->get();
                                    @endphp

                                    @foreach ($reviews as $item)
                                        <div class="swiper-slide">
                                            <div class="gt-testimonial-content">
                                                <p>"{{ $item->message }}"</p>
                                                <div class="gt-client-item">
                                                    <div class="client-image">
                                                        <img src="{{ $item->image ? asset('storage/'. $item->image) : asset('frontend/assets/img/home-1/testimonial/default-client.png') }}"
                                                            alt="{{ $item->name }}">
                                                    </div>
                                                    <div class="cont">
                                                        <h3>{{ $item->name }}</h3>
                                                        <span>{{ $item->position }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right -->
                    <div class="col-xl-3 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                        <div class="gt-testimonial-right">
                            <div class="gt-info-item">
                                <button class="array-next">NEXT <i class="fa-solid fa-arrow-right"></i></button>
                                <div class="client-image">
                                    <img src="{{ asset('frontend/assets/img/home-1/testimonial/client-4.png') }}"
                                        alt="img">
                                </div>
                            </div>
                            <div class="gt-arrow">
                                <img src="{{ asset('frontend/assets/img/home-1/testimonial/quate.png') }}"
                                    alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
