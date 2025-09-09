@php
    use App\Models\Hero;
    $hero = Hero::first();
@endphp
<section class="hero-section hero-1 fix bg-cover"
    style="background-image: url({{ asset($hero->bg_image) }});">
    <div class="radius-box-1">
        <div class="circle-image">
            <img src="{{ asset('frontend/assets/img/home-1/hero/circle.png') }}" alt="img">
            <div class="star">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </div>
    <div class="right-shape">
        <img src="{{ asset('frontend/assets/img/home-1/hero/count.png') }}" alt="">
    </div>
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col-xl-12">
                <div class="gt-hero-content">
                    <h1 class="wow img-custom-anim-top" data-wow-duration="1.3s" data-wow-delay="0.3s">
                        {{ $hero->title ?? 'EMPOWERING YOUR' }} <br>
                        FINANCIAL <span>{{ $hero->highlight ?? 'CONFIDENCE' }}</span>
                    </h1>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="gt-shape-image">
                    <img src="{{ asset($hero->map_image) }}" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="gt-hero-image wow img-custom-anim-bottom" data-wow-duration="1.3s" data-wow-delay="0.3s">
                    <img src="{{ asset($hero->main_image) }}" alt="img">
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="right-content wow img-custom-anim-right" data-wow-duration="1.3s" data-wow-delay="0.3s">
                    <p>
                        Based in Harrow, London, Modern Trading and Services LLP provides tailored financial and
                        business solutions for SMEs, delivering expert guidance and trusted support to help your
                        business grow with confidence. </p>
                    <a href="contact.html" class="gt-theme-btn">
                        <span>FREE CONSULTATION <i class="fa-solid fa-arrow-right"></i></span>
                        <span>FREE CONSULTATION <i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
