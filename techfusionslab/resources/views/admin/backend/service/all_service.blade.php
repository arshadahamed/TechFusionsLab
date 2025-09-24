@extends('admin.admin_master')
@section('admin')
<div class="content">

    <div class="container-xxl">

        <!-- Header & Search -->
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Services</h4>
            </div>
            <div class="mt-2 mt-sm-0">
                <form action="{{ route('all.services') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search services..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary btn-sm ms-2">Search</button>
                </form>
            </div>
        </div>

        <!-- Services Table -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Services</h5>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Number</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                        <th>Link</th>
                                        <th>Hover Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($services as $key => $item)
                                        <tr>
                                            <td>{{ $services->firstItem() + $key }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td><img src="{{  asset('storage/'.$item->icon) }}" style="width:60px;height:60px;"></td>
                                            <td>{{ Str::limit($item->description, 50, '...') }}</td>
                                            <td>{{ $item->link }}</td>
                                            <td><img src="{{  asset('storage/'.$item->hover_image) }}" style="width:60px;height:60px;"></td>
                                            <td>
                                                <a href="{{ route('edit.service', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('delete.service', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No services found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination info + links -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <!-- Left: Showing X to Y of Z results -->
                            <div>
                                @if($services->total() > 0)
                                    Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of {{ $services->total() }} results
                                @else
                                    No results found
                                @endif
                            </div>

                            <!-- Right: Pagination links -->
                            <div>
                                {{ $services->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
