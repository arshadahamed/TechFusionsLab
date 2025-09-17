@php
    use App\Models\Hero;
    $hero = Hero::first();
@endphp
<section class="hero-section hero-1 fix bg-cover"
    style="background-image: url({{ asset('storage/' . $hero->bg_image) }});">
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
                        {{ $hero->title_two ?? 'FINANCIAL' }} <span class="mx-8"></span> {{ $hero->highlight ?? 'CONFIDENCE' }}

                    </h1>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="gt-shape-image">
                    <img src="{{ asset('storage/' .$hero->map_image) }}" alt="img">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="gt-hero-image wow img-custom-anim-bottom" data-wow-duration="1.3s" data-wow-delay="0.3s">
                    <img src="{{ asset('storage/' . $hero->main_image) }}" alt="img">
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="right-content wow img-custom-anim-right" data-wow-duration="1.3s" data-wow-delay="0.3s">
                    <p> {{ $hero->description ?? 'Your Trusted Partner for Financial Success' }}</p>
                    <a href="{{ route('contact') }}" class="gt-theme-btn">
                        <span>FREE CONSULTATION <i class="fa-solid fa-arrow-right"></i></span>
                        <span>FREE CONSULTATION <i class="fa-solid fa-arrow-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
