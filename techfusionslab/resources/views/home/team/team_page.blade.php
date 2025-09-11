@extends('home.home_master')
@section('home')
@php
    use App\Models\Team;
    $teams = Team::where('status', 'active')->get();
@endphp

<!-- GT Hero Section Start -->
<div class="gt-breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('frontend/assets/img/inner-page/breadcrumb/bg.jpg') }})">
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
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Team Members</h1>
            </div>
            <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Team Members</li>
            </ul>
        </div>
    </div>
</div>

<!-- Gt-Team Section-3 Start -->
<section class="gt-team-section-3 section-padding fix bg-cover" style="background-image: url({{ asset('frontend/assets/img/home-3/team/bg.jpg') }})">
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
            @foreach($teams as $team)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="gt-team-card-items-3 wow img-custom-anim" data-wow-duration="1.3s" data-wow-delay="0.3s">
                        <div class="gt-team-image">
                            <img src="{{ asset($team->image ?? 'frontend/assets/img/home-3/team/default.jpg') }}" alt="{{ $team->name }}">
                        </div>
                        <div class="gt-team-content">
                            <h4>{{ $team->name }}</h4>
                            <p>{{ $team->position }}</p>
                            <div class="gt-social-icon">
                                @if($team->twitter)<a href="{{ $team->twitter }}"><i class="fa-brands fa-twitter"></i></a>@endif
                                @if($team->youtube)<a href="{{ $team->youtube }}"><i class="fa-brands fa-youtube"></i></a>@endif
                                @if($team->instagram)<a href="{{ $team->instagram }}"><i class="fa-brands fa-instagram"></i></a>@endif
                                @if($team->facebook)<a href="{{ $team->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
