@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<div class="content">
    <div class="container-xxl">

        <!-- Page Header -->
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column border-bottom mb-3">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">
                    <i class="fas fa-blog me-2 text-primary"></i> All Blogs
                </h4>
                <p class="text-muted small m-0">Manage, search and sort your blog posts</p>
            </div>
            <div class="mt-3 mt-sm-0">
                <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Add New Blog
                </a>
            </div>
        </div>

        <!-- Search + Filter -->
        <form method="GET" action="{{ route('blogs.index') }}" class="row g-2 mb-3">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                       placeholder="Search by title, author, category, tags...">
            </div>
            <div class="col-md-2">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="">Sort By</option>
                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
                    <option value="author" {{ request('sort') == 'author' ? 'selected' : '' }}>Author</option>
                    <option value="category" {{ request('sort') == 'category' ? 'selected' : '' }}>Category</option>
                    <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Published Date</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">
                    <i class="fas fa-search me-1"></i> Search
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('blogs.index') }}" class="btn btn-light w-100">
                    <i class="fas fa-undo me-1"></i> Reset
                </a>
            </div>
        </form>

        <!-- Blog Table -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Featured</th>
                                        <th>Published At</th>
                                        <th>Main Image</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blog as $key => $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ ($blog->currentpage()-1) * $blog->perpage() + $key + 1 }}
                                            </td>
                                            <td>{{ Str::limit($item->title, 30) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $item->author_image ? asset('storage/'.$item->author_image) : asset('upload/no_image.jpg') }}"
                                                        alt="author"
                                                        class="rounded-circle me-2 shadow-sm"
                                                        width="35" height="35">
                                                    <span>{{ $item->author_name ?? 'Unknown' }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $item->category ?? '-' }}</td>
                                            <td>
                                                @if($item->tags)
                                                    <span class="badge bg-info text-dark">{{ $item->tags }}</span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span class="badge {{ $item->is_featured ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $item->is_featured ? 'Yes' : 'No' }}
                                                </span>
                                            </td>
                                            <td>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M, Y') : '-' }}</td>
                                            <td>
                                                <img src="{{ $item->main_image ? asset('storage/'.$item->main_image) : asset('upload/no_image.jpg') }}"
                                                    alt="main image"
                                                    class="rounded shadow-sm"
                                                    width="60" height="40">
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('blogs.edit', $item->id) }}"
                                                   class="btn btn-sm btn-info me-1" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('blogs.destroy', $item->id) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure to delete this blog?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted py-4">
                                                <i class="fas fa-folder-open fa-2x mb-2"></i>
                                                <p class="mb-0">No Blogs Found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($blog->hasPages())
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="text-muted small">
                                    Showing <strong>{{ $blog->firstItem() }}</strong> to
                                    <strong>{{ $blog->lastItem() }}</strong> of
                                    <strong>{{ $blog->total() }}</strong> blogs
                                </div>
                                <div>
                                    {{ $blog->onEachSide(1)->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
