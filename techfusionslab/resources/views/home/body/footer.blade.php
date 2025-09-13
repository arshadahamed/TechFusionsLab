<footer class="gt-footer-section-1 fix bg-cover"
    style="background-image: url({{ asset('frontend/assets/img/home-1/footer-bg-2.jpg') }});">
    <div class="mycustom-marque section-padding pb-0">
        <div class="scrolling-wrap style-1">
            <div class="comm">
                <div></div>
                <div class="cmn-textslide"><img src="{{ asset('frontend/assets/img/home-1/arrow-2.png') }}"
                        alt="img">LET’S GET IN TOUCH</div>
                <div class="cmn-textslide"><img src="{{ asset('frontend/assets/img/home-1/arrow-2.png') }}"
                        alt="img">LET’S GET IN TOUCH</div>
            </div>
            <div class="comm">
                <div></div>
                <div class="cmn-textslide"><img src="{{ asset('frontend/assets/img/home-1/arrow-2.png') }}"
                        alt="img">LET’S GET IN TOUCH</div>
                <div class="cmn-textslide"><img src="{{ asset('frontend/assets/img/home-1/arrow-2.png') }}"
                        alt="img">LET’S GET IN TOUCH</div>
            </div>
            <div class="comm">
                <div></div>
                <div class="cmn-textslide"><img src="{{ asset('frontend/assets/img/home-1/arrow-2.png') }}"
                        alt="img">LET’S GET IN TOUCH</div>
                <div class="cmn-textslide"><img src="{{ asset('frontend/assets/img/home-1/arrow-2.png') }}"
                        alt="img">LET’S GET IN TOUCH</div>
            </div>
        </div>
    </div>
    <div class="container custom-container">
        <div class="gt-footer-widget-wrapper-1">
            <div class="shape float-bob-y">
                <img src="{{ asset('frontend/assets/img/home-1/Star-1.png') }}" alt="img">
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="gt-footer-left-item-1 wow img_full img_left_animation">
                        <div class="gt-arrow">
                            <img src="{{ asset('frontend/assets/img/home-1/arrow.png') }}" alt="img">
                        </div>
                        <div class="footer-left-content">
                            <h3>
                                Ready Discover More? Contact Us Today!
                            </h3>
                            <p>
                                Ready to take the next step? Reach out to our expert team today and discover how we can
                                help your business grow
                            </p>
                            <form action="#">
                                <div class="form-clt">
                                    <input type="text" name="email" id="email"
                                        placeholder="Your Email Address">
                                    <button type="submit" class="gt-theme-btn">
                                        <span>SUBSCRIBE NOW</span>
                                        <span>SUBSCRIBE NOW</span>
                                    </button>
                                </div>
                            </form>
                            <div class="social-list">
                                <a href="{{ $company->instagram }}" target="_blank">Instagram</a>
                                <a href="{{ $company->facebook }}" target="_blank">Facebook</a>
                                <a href="{{ $company->linkedin }}" target="_blank">linkedin</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="gt-footer-right-item">
                        <div class="row">
                            <div class="col-xl-3 col-lg-5 col-md-4 wow fadeInUp" data-wow-delay=".3s">
                                <div class="gt-footer-single-items">
                                    <div class="gt-widget-title">
                                        <h4>SERVICES</h4>
                                    </div>
                                    @php
                                        $services = App\Models\Service::orderBy('number', 'asc')->take(4)->get();
                                    @endphp

                                    <ul class="gt-list-items">
                                        @foreach ($services as $service)
                                            <li>
                                                <a href="{{ $service->link ?? '#' }}">{{ $service->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 wow fadeInUp" data-wow-delay=".5s">
                                <div class="gt-footer-single-items">
                                    <div class="gt-widget-title">
                                        <h4>QUICK LINKS</h4>
                                    </div>
                                    <ul class="gt-list-items">
                                        <li>
                                            <a href="{{ route('about') }}">About Us</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('service') }}">Services</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('our.team') }}">Our Team</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-4 wow fadeInUp" data-wow-delay=".7s">
                                <div class="gt-footer-single-items">
                                    <div class="gt-widget-title">
                                        <h4>{{ $company->company_name }}</h4>
                                    </div>
                                    <div class="footer-contact-content">
                                        <p>
                                            {{ $company->address }}
                                        </p>
                                        <ul class="contact-list">
                                            <li>
                                                <i class="fa-solid fa-square-chevron-down"></i>
                                                <a
                                                    href="mailto:{{ $company->email_one }}">{{ $company->email_one }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gt-footer-bottom wow img_full img_right_animation">
                            <a href="https://www.arshadahamed.com">
                                <img src="{{ $company->dark_logo ? asset($company->dark_logo) : asset('frontend/assets/img/logo/black-logo.png') }}"
                                    alt="Dark Logo">
                            </a>
                            <p>
                                Copyright ©
                                <a href="https://egrow.lk" target="_blank"
                                    style="color: white; margin-left: 4px; margin-right: 4px;">Arshad Ahamed</a>
                                All Rights Reserved.
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
