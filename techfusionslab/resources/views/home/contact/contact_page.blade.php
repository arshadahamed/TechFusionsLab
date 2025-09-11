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

                            @if (session('success'))
                                <div class="alert alert-success mt-2">
                                    {{ session('success') }}
                                </div>
                            @endif


                            @if (session('success'))
                                <div class="alert alert-success mt-2">{{ session('success') }}</div>
                            @endif

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
                                src="{{ $companyInfo->map_link ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902632703823!2d90.4066326755292!3d23.750903894634736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b0b9f5a6b7%3A0x8e7c4f4e4f4e4f4e!2sTechFusions%20Lab%20-%20Web%20Design%20%26%20Development%20Company%20in%20Bangladesh!5e0!3m2!1sen!2sbd!4v1696112345678!5m2!1sen!2sbd' }}"
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
