@php
use App\Models\Blog;

$featuredBlog = Blog::where('is_featured', 1)->orderBy('published_at', 'desc')->first();
$otherBlogs = Blog::where('id', '!=', optional($featuredBlog)->id)
                ->orderBy('published_at', 'desc')
                ->take(4)
                ->get();
@endphp

<section class="gt-news-section-1 section-padding fix">
    <div class="container">
        <div class="gt-section-title text-center">
            <span class="gt-sub-title wow fadeInUp">
                <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img">
                Our Blog & News
                <img src="{{ asset('frontend/assets/img/home-1/icon/03.svg') }}" alt="img">
            </span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">Articles & Blog Posts</h2>
        </div>

        <div class="row">
            {{-- Featured Blog --}}
            @if($featuredBlog)
            <div class="col-xl-12 mb-4">
                <div class="gt-news-card-items-3 wow img_full img_left_animation">
                    <div class="gt-news-image">
                        <img src="{{ $featuredBlog->main_image ? Storage::url($featuredBlog->main_image) : asset('upload/no_image.jpg') }}"
                             alt="img" class="w-full h-64 object-cover">
                        @if($featuredBlog->category) <span>{{ $featuredBlog->category }}</span> @endif
                    </div>
                    <div class="gt-news-content style-1">
                        <ul class="gt-news-post">
                            <li><i class="fa-solid fa-calendar-days"></i> {{ $featuredBlog->published_at?->format('F d, Y') }}</li>
                            <li><i class="fa-solid fa-square-chevron-down"></i> By {{ $featuredBlog->author_name ?? 'Admin' }}</li>
                        </ul>
                        <h3>
                            <a href="{{ route('blogs.show', ['id' => $featuredBlog->id, 'slug' => Str::slug($featuredBlog->title)]) }}">
                                {{ Str::limit($featuredBlog->title, 80) }}
                            </a>
                        </h3>
                        <a href="{{ route('blogs.show', ['id' => $featuredBlog->id, 'slug' => Str::slug($featuredBlog->title)]) }}" class="gt-link-btn">
                            <span>VIEW MORE <i class="fa-solid fa-arrow-right"></i></span>
                            <span>VIEW MORE <i class="fa-solid fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            {{-- Other Blogs --}}
            <div class="col-xl-8 col-lg-6">
                <div class="row">
                    @foreach($otherBlogs->take(2) as $blog)
                        <div class="col-xl-6 col-lg-12">
                            <div class="gt-news-card-items-3 wow img_full {{ $loop->odd ? 'img_left_animation' : 'img_right_animation' }}">
                                <div class="gt-news-image">
                                    <img src="{{ $blog->main_image ? Storage::url($blog->main_image) : asset('upload/no_image.jpg') }}"
                                         alt="img" class="w-full h-48 object-cover">
                                    @if($blog->category) <span>{{ $blog->category }}</span> @endif
                                </div>
                                <div class="gt-news-content style-1">
                                    <ul class="gt-news-post">
                                        <li><i class="fa-solid fa-calendar-days"></i> {{ $blog->published_at?->format('F d, Y') }}</li>
                                        <li><i class="fa-solid fa-square-chevron-down"></i> By {{ $blog->author_name ?? 'Admin' }}</li>
                                    </ul>
                                    <h3>
                                        <a href="{{ route('blogs.show', ['id' => $blog->id, 'slug' => Str::slug($blog->title)]) }}">
                                            {{ Str::limit($blog->title, 60) }}
                                        </a>
                                    </h3>
                                    <a href="{{ route('blogs.show', ['id' => $blog->id, 'slug' => Str::slug($blog->title)]) }}" class="gt-link-btn">
                                        <span>VIEW MORE <i class="fa-solid fa-arrow-right"></i></span>
                                        <span>VIEW MORE <i class="fa-solid fa-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-4 col-lg-6">
                @foreach($otherBlogs->skip(2) as $blog)
                    <div class="gt-news-card-left-item style-1 mt-{{ $loop->first ? '0' : '24' }} wow img_full img_right_animation">
                        <div class="gt-news-image">
                            <img src="{{ $blog->main_image ? Storage::url($blog->main_image) : asset('upload/no_image.jpg') }}"
                                 alt="img" class="w-full h-32 object-cover">
                        </div>
                        <div class="gt-news-content">
                            <ul class="gt-news-post">
                                <li><i class="fa-solid fa-calendar-days"></i> {{ $blog->published_at?->format('F d, Y') }}</li>
                                <li><i class="fa-solid fa-square-chevron-down"></i> By {{ $blog->author_name ?? 'Admin' }}</li>
                            </ul>
                            <h6>
                                <a href="{{ route('blogs.show', ['id' => $blog->id, 'slug' => Str::slug($blog->title)]) }}">
                                    {{ Str::limit($blog->title, 50) }}
                                </a>
                            </h6>
                            <a href="{{ route('blogs.show', ['id' => $blog->id, 'slug' => Str::slug($blog->title)]) }}" class="gt-link-btn">
                                <span>VIEW MORE <i class="fa-solid fa-arrow-right"></i></span>
                                <span>VIEW MORE <i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>
