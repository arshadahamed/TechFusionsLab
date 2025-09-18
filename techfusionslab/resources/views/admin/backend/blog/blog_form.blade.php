@php
    $isEdit = isset($blog);
@endphp

<form action="{{ $isEdit ? route('blogs.update', $blog->id) : route('blogs.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    {{-- General Info --}}
    <h5 class="fw-bold text-secondary mb-3"><i class="fas fa-info-circle me-1"></i> General Information</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="title"
                       value="{{ old('title', $blog->title ?? '') }}" required
                       placeholder="Enter blog title">
                @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Subtitle</label>
                <input class="form-control" type="text" name="subtitle"
                       value="{{ old('subtitle', $blog->subtitle ?? '') }}"
                       placeholder="Enter blog subtitle">
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="5"
                  placeholder="Write your blog content here...">{{ old('content', $blog->content ?? '') }}</textarea>
    </div>

    {{-- Images --}}
    <h5 class="fw-bold text-secondary mt-4 mb-3"><i class="fas fa-image me-1"></i> Images</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Main Image <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="main_image" id="main_image" {{ $isEdit ? '' : 'required' }}>
                <small class="text-muted">Recommended size: 916x505 px</small>
                <img id="showMainImage"
                     src="{{ old('main_image', $blog->main_image ?? url('upload/no_image.jpg')) }}"
                     class="rounded img-thumbnail mt-2 d-block"
                     style="max-width: 300px; height:auto;"
                     alt="Blog Main Image Preview">
                @error('main_image') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Author Image</label>
                <input class="form-control" type="file" name="author_image" id="author_image">
                <img id="showAuthorImage"
                     src="{{ old('author_image', $blog->author_image ?? url('upload/no_image.jpg')) }}"
                     class="rounded-circle img-thumbnail mt-2 d-block"
                     style="width: 100px; height:100px;"
                     alt="Author Image Preview">
            </div>
        </div>
    </div>

    {{-- Author + Meta --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Author Name</label>
                <input class="form-control" type="text" name="author_name"
                       value="{{ old('author_name', $blog->author_name ?? '') }}" placeholder="Author full name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Published At</label>
                <input class="form-control" type="date" name="published_at"
                       value="{{ old('published_at', $blog->published_at ?? '') }}">
            </div>
        </div>
    </div>

    {{-- Tags + Category --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Tags</label>
                <input class="form-control" type="text" name="tags"
                       value="{{ old('tags', $blog->tags ?? '') }}" placeholder="e.g. laravel, php, blog">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label class="form-label">Category</label>
                <input class="form-control" type="text" name="category"
                       value="{{ old('category', $blog->category ?? '') }}" placeholder="Enter category">
            </div>
        </div>
    </div>

    <div class="form-check form-switch mb-4">
        <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured"
               {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_featured">Featured Blog</label>
    </div>

    {{-- SEO Settings --}}
    <hr>
    <h5 class="fw-bold text-secondary mb-3"><i class="fas fa-search me-1"></i> SEO Settings</h5>

    <div class="form-group mb-3">
        <label class="form-label">Meta Title</label>
        <input class="form-control" type="text" name="meta_title"
               value="{{ old('meta_title', $blog->meta_title ?? '') }}" placeholder="SEO title for this blog">
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Meta Description</label>
        <textarea class="form-control" name="meta_description" rows="3"
                  placeholder="Brief SEO description...">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Meta Keywords</label>
        <input class="form-control" type="text" name="meta_keywords"
               value="{{ old('meta_keywords', $blog->meta_keywords ?? '') }}" placeholder="keyword1, keyword2">
    </div>

    <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('blogs.index') }}" class="btn btn-light me-2">
            <i class="fas fa-arrow-left"></i> Cancel
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> {{ $isEdit ? 'Update' : 'Save' }} Blog
        </button>
    </div>
</form>

{{-- Image preview scripts --}}
<script type="text/javascript">
$(document).ready(function() {
    $('#main_image').change(function() {
        let reader = new FileReader();
        reader.onload = e => $('#showMainImage').attr('src', e.target.result);
        reader.readAsDataURL(this.files[0]);
    });
    $('#author_image').change(function() {
        let reader = new FileReader();
        reader.onload = e => $('#showAuthorImage').attr('src', e.target.result);
        reader.readAsDataURL(this.files[0]);
    });
});
</script>
