@extends('home.home_master')
@section('home')
    @php
        use App\Models\CompanyInfo;
        $companyInfo = CompanyInfo::first();
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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Contact Us</h1>
                </div>
                <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Contact Section Start -->
    <section class="gt-contact-section section-padding fix">
        <div class="container">
            <div class="gt-contact-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="gt-contact-us-box">
                            <div class="gt-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="gt-contact-us-content">
                                <span>Phone No</span>
                                <h5>
                                    <a href="tel:{{ $companyInfo->phone_one }}">{{ $companyInfo->phone_one }}</a> <br>
                                    <a href="tel:{{ $companyInfo->phone_two }}">{{ $companyInfo->phone_two }}</a>
                                </h5>
                            </div>
                        </div>
                        <div class="gt-contact-us-box">
                            <div class="gt-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="gt-contact-us-content">
                                <span>Location</span>
                                <h5>
                                    {{ $companyInfo->address }}
                                </h5>
                            </div>
                        </div>
                        <div class="gt-contact-us-box mb-0">
                            <div class="gt-icon">
                                <i class="fa-solid fa-square-chevron-down"></i>
                            </div>
                            <div class="gt-contact-us-content">
                                <span>Email Address</span>
                                <h5>
                                    <a href="mailto:{{ $companyInfo->email_one }}">{{ $companyInfo->email_one }}</a> <br>
                                    <a href="mailto:{{ $companyInfo->email_two }}">{{ $companyInfo->email_two }}</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        @if (session('success'))
                                <div  id="success-alert" class="alert alert-success mt-2">
                                    {{ session('success') }}
                                </div>
                         @endif
                        <div class="gt-comment-form-wrap">
                            <h3>Send Us Message</h3>
                            <p>There will be no publication of your email address. Required fields are indicated with a *.
                            </p>
                            <form action="{{ route('contact.send') }}" method="POST" id="contact-form">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Your Name</span>
                                            <input type="text" name="name" id="name" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Your Email</span>
                                            <input type="text" name="email" id="email6" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <span>Write Message</span>
                                            <textarea name="message" id="message" placeholder="Type your message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="gt-theme-btn">
                                            <span>SEND MESSAGE <i class="fa-solid fa-arrow-right"></i></span>
                                            <span>SEND MESSAGE <i class="fa-solid fa-arrow-right"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section Start -->
    <div class="gt-map-section section-padding fix pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="gt-map-items">
                        <div class="googpemap">
                            <iframe
                                src="{{ $companyInfo->map_iframe }}"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    // Fade out after 3 seconds (3000ms)
    window.addEventListener('DOMContentLoaded', (event) => {
        const alert = document.getElementById('success-alert');
        if(alert){
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500); // Remove from DOM after fade
            }, 3000);
        }
    });
</script>
@endsection
