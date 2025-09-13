<section class="gt-faq-section section-padding fix section-bg-1">
    <div class="container">
        <div class="gt-faq-wrapper">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="gt-faq-content">
                        <div class="gt-section-title mb-0">
                            <span class="gt-sub-title wow fadeInUp">
                                <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img"> Client Support & FAQs
                            </span>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                Frequently Asked Questions
                            </h2>
                        </div>
                        <p class="gt-text wow fadeInUp" data-wow-delay=".5s">
                            Find answers to common questions about our financial consulting services, pricing, planning process, and how we help you achieve your long-term financial goals with confidence.
                        </p>
                        {{-- <div class="client-info-item wow fadeInUp" data-wow-delay=".3s">
                            <div class="info-item">
                                <div class="client-image">
                                    <img src="{{ asset('frontend/assets/img/home-1/faq/client-1.png') }}" alt="img">
                                </div>
                                <div class="client-image style-2">
                                    <img src="{{ asset('frontend/assets/img/home-1/faq/client-2.png') }}" alt="img">
                                </div>
                                <div class="client-image style-2">
                                    <img src="{{ asset('frontend/assets/img/home-1/faq/client-3.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="rivews-content">
                                <h4><span class="gt-count">3</span>M+</h4>
                                <span>Happy Customer</span>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="faq-items">
                        <div class="accordion" id="accordionExample">
                            @php
                                use App\Models\Faq;
                                $faqs = Faq::where('status', '1')->orderBy('id', 'asc')->get();
                            @endphp

                            @foreach($faqs as $index => $faq)
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".{{ ($index+1)*2 }}s">
                                    <h4 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                            {{ sprintf('%02d', $index+1) }}. {{ $faq->question }}
                                        </button>
                                    </h4>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
