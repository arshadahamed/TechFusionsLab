@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <div class="content">
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">
                        <i class="fas fa-pen-to-square me-1 text-primary"></i>
                        {{ isset($blog) ? 'Edit Blog' : 'Add New Blog' }}
                    </h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">

                            <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (isset($blog))
                                    @method('PUT')
                                @endif

                                {{-- General Info --}}
                                <h5 class="fw-bold text-secondary mb-3">
                                    <i class="fas fa-info-circle me-1"></i> General Information
                                </h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Enter blog title"
                                                value="{{ old('title', $blog->title ?? '') }}" required>
                                            @error('title')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" name="subtitle" class="form-control"
                                                placeholder="Enter blog subtitle"
                                                value="{{ old('subtitle', $blog->subtitle ?? '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" class="form-control" rows="5" placeholder="Write your blog content...">{{ old('content', $blog->content ?? '') }}</textarea>
                                </div>

                                {{-- Images --}}
                                <h5 class="fw-bold text-secondary mt-4 mb-3">
                                    <i class="fas fa-image me-1"></i> Images
                                </h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Main Image <span class="text-danger">*</span></label>
                                            <input type="file" name="main_image" id="main_image" class="form-control"
                                                {{ isset($blog) ? '' : 'required' }}>
                                            <small class="text-muted">Recommended size: 916x505 px</small>
                                            <img id="showMainImage"
                                                src="{{ isset($blog) && $blog->main_image ? asset('storage/' . $blog->main_image) : url('upload/no_image.jpg') }}"
                                                class="rounded img-thumbnail mt-2 d-block"
                                                style="max-width: 300px; height:auto;" alt="Blog Main Image Preview">
                                            @error('main_image')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Author Image</label>
                                            <input type="file" name="author_image" id="author_image"
                                                class="form-control">
                                            <img id="showAuthorImage"
                                                src="{{ isset($blog) && $blog->author_image ? asset('storage/' . $blog->author_image) : url('upload/no_image.jpg') }}"
                                                class="rounded-circle img-thumbnail mt-2 d-block"
                                                style="width: 100px; height:100px;" alt="Author Image Preview">
                                        </div>
                                    </div>
                                </div>

                                {{-- Author + Meta --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Author Name</label>
                                            <input type="text" name="author_name" class="form-control"
                                                placeholder="Author full name"
                                                value="{{ old('author_name', $blog->author_name ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Published At</label>
                                            <input type="date" name="published_at" class="form-control"
                                                value="{{ old('published_at', isset($blog->published_at) ? $blog->published_at->format('Y-m-d') : '') }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- Tags + Category --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Tags</label>
                                            <input type="text" name="tags" class="form-control"
                                                placeholder="e.g. laravel, php, blog"
                                                value="{{ old('tags', $blog->tags ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Category</label>
                                            <input type="text" name="category" class="form-control"
                                                placeholder="Enter category"
                                                value="{{ old('category', $blog->category ?? '') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check form-switch mb-4">
                                    <input type="checkbox" name="is_featured" id="is_featured" class="form-check-input"
                                        {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">Featured Blog</label>
                                </div>

                                {{-- SEO Settings --}}
                                <hr>
                                <h5 class="fw-bold text-secondary mb-3">
                                    <i class="fas fa-search me-1"></i> SEO Settings
                                </h5>

                                <div class="form-group mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        placeholder="SEO title for this blog"
                                        value="{{ old('meta_title', $blog->meta_title ?? '') }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3" placeholder="Brief SEO description...">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control"
                                        placeholder="keyword1, keyword2"
                                        value="{{ old('meta_keywords', $blog->meta_keywords ?? '') }}">
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <a href="{{ route('blogs.index') }}" class="btn btn-light me-2">
                                        <i class="fas fa-arrow-left"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> {{ isset($blog) ? 'Update' : 'Save' }} Blog
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            function readURL(input, targetId) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = e => $(targetId).attr('src', e.target.result);
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#main_image').change(function() {
                readURL(this, '#showMainImage');
            });
            $('#author_image').change(function() {
                readURL(this, '#showAuthorImage');
            });
        });
    </script>
@endsection
