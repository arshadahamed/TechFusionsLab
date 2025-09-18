@extends('home.home_master')
@section('home')
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
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $blog->title }}</h1>
                </div>
                <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>

    @php
        use App\Models\Blog;

        // Recent posts
        $recentPosts = Blog::latest()->take(3)->get();

        // Unique categories
        $allCategories = Blog::pluck('category')->filter()->unique();

        // Tags for current blog (comma-separated)
        $tags = $blog->tags ? explode(',', $blog->tags) : [];
    @endphp

    <!-- GT News Section Start -->
    <section class="gt-news-section-3 section-padding">
        <div class="container">
            <div class="gt-news-details-wrapper">
                <div class="row g-4">
                    <!-- Blog Content -->
                    <div class="col-12 col-lg-8">
                        <div class="gt-details-image">
                            <img src="{{ Storage::url($blog->main_image) }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="gt-news-details-content">
                            <h3>{{ $blog->subtitle }}</h3>
                            <p>{!! $blog->content !!}</p>
                            <div class="row gt-tag-share-wrap mt-4 mb-5">
                                <div class="col-lg-8 col-12">
                                    <div class="tagcloud">
                                        <span>Tags:</span>
                                        @foreach ($tags as $tag)
                                            <a href="{{ route('about', trim($tag)) }}">{{ trim($tag) }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 mt-3 mt-lg-0 text-lg-end">
                                    <div class="social-share">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4 col-12">
                        <div class="main-sideber">
                            <!-- Search Widget -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Search</h4>
                                </div>
                                <div class="search-widget">
                                    <form action="{{ route('about') }}" method="GET">
                                        <input type="text" name="query" placeholder="Search here">
                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>

                            <!-- Categories Widget -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Categories</h4>
                                </div>
                                {{-- <div class="news-widget-categories">
                                    <ul>
                                        @foreach ($allCategories as $category)
                                            <li>
                                                <a href="{{ route('', $category) }}">{{ $category }}</a>
                                                <span>{{ Blog::where('category', $category)->count() }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                            </div>

                            <!-- Recent Posts -->
                            <div class="single-sidebar-widget">
                                <div class="wid-title">
                                    <h4>Recent Posts</h4>
                                </div>
                                <div class="recent-post-area">
                                    @foreach ($recentPosts as $post)
                                        <div class="recent-items">
                                            <div class="recent-thumb">
                                                <img src="{{ Storage::url($post->main_image) }}" alt="{{ $post->title }}" width="80" height="80">
                                            </div>

                                            <div class="recent-content">
                                                <h6>
                                                    <a
                                                        href="{{ route('blogs.show', ['id' => $post->id, 'slug' => \Illuminate\Support\Str::slug($post->title)]) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h6>
                                                <ul>
                                                    <li>{{ $post->published_at->format('F d, Y') }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Tag Cloud -->
                            {{-- <div class="single-sidebar-widget mb-0">
                                <div class="wid-title">
                                    <h4>Tag Cloud</h4>
                                </div>
                                <div class="news-widget-categories">
                                    <div class="tagcloud">
                                        @foreach ($allCategories as $category)
                                            <a href="{{ route('category.blogs', $category) }}">{{ $category }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
