@php
    use App\Models\Team;
    $teams = Team::where('status', 'active')->get();
@endphp

<section class="gt-team-section section-padding fix bg-cover" style="background-image: url({{ asset('frontend/assets/img/home-1/team/bg.jpg') }});">
    <div class="container">
        <div class="gt-team-wrapper">
            <div class="gt-section-title mb-0">
                <span class="gt-sub-title wow fadeInUp">
                    <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img"> Our Trusted Team
                </span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">
                    Meet Our Financial Experts
                </h2>
            </div>
            <p class="gt-text wow fadeInUp" data-wow-delay=".5s">
                Meet Our Financial Experts — a dedicated team of professionals with deep industry knowledge and a passion for helping you succeed. We provide trusted advice, personalized solutions, and long-term financial support.
            </p>

            <div class="swiper gt-team-slider">
                <div class="swiper-wrapper">
                    @foreach($teams as $team)
                        <div class="swiper-slide">
                            <div class="gt-team-card-items">
                                <div class="gt-team-image">
                                    <img src="{{ asset($team->image ?? 'frontend/assets/img/home-1/team/default.jpg') }}" alt="img">
                                    <div class="gt-team-content">
                                        <h4>
                                            <a href="{{route('our.team')}}">{{ $team->name }}</a>
                                        </h4>
                                        <p>{{ $team->position }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="array-buttons wow fadeInUp" data-wow-delay=".5s">
                <button class="array-prev">PREV <i class="fa-solid fa-arrow-left"></i></button>
                <button class="array-next">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>
