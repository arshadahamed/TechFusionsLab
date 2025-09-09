@php
    $services = App\Models\Service::orderBy('number', 'asc')->get();
@endphp

<section class="gt-services-section section-padding fix bg-cover"
    style="background-image: url('{{ asset('frontend/assets/img/home-1/service/service-bg.jpg') }}');">
    <div class="container">
        <div class="gt-section-title text-center">
            <span class="gt-sub-title wow fadeInUp">
                <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img">
                Our Financial Services
                <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img">
            </span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                Expert Financial Solutions
            </h2>
        </div>

        <div class="gt-service-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    @foreach ($services as $service)
                        <div class="gt-service-main-items wow fadeInUp" data-wow-delay=".3s">
                            <div class="image-hover d-none d-md-block bg-cover"
                                style="background-image: url('{{ asset($service->hover_image ?? 'frontend/assets/img/home-1/service/hover.png') }}');">
                            </div>

                            {{-- Odd items --}}
                            @if ($loop->iteration % 2 != 0)
                                <div class="gt-service-left-items">
                                    <div class="service-content">
                                        <h4>{{ $service->number }}</h4>
                                        <h3>
                                            <a href="{{ $service->link ?? '#' }}">{{ $service->title }}</a>
                                        </h3>
                                    </div>
                                    <p>{{ $service->description }}</p>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset($service->icon ?? 'frontend/assets/img/home-1/icon/21.svg') }}" alt="icon">
                                </div>

                            {{-- Even items --}}
                            @else
                                <div class="icon">
                                    <img src="{{ asset($service->icon ?? 'frontend/assets/img/home-1/icon/21.svg') }}" alt="icon">
                                </div>
                                <div class="gt-service-left-items">
                                    <p>{{ $service->description }}</p>
                                    <div class="service-content style-2">
                                        <h3>
                                            <a href="{{ $service->link ?? '#' }}">{{ $service->title }}</a>
                                        </h3>
                                        <h4>{{ $service->number }}</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
