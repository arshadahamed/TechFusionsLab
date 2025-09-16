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
                                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('frontend/assets/img/home-1/testimonial/default-client.png') }}"
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
                            <img src="{{ asset('frontend/assets/img/home-1/testimonial/quate.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->
