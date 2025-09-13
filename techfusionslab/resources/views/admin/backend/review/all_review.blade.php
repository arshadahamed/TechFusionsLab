@extends('admin.admin_master')
@section('admin')
<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Reviews</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Reviews</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Image</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($review as $key => $item)
                                <tr>
                                    <td>{{ $review->firstItem() + $key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td><img src="{{ asset($item->image) }}" style="width: 61px; height:60px;"></td>
                                    <td>{{ Str::limit($item->message, 50, '...') }}</td>
                                    <td>
                                        <a href="{{ route('edit.review', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('delete.review', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                              <!-- Pagination info + links -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <!-- Left: Showing X to Y of Z results -->
                            <div>
                                @if($review->total() > 0)
                                    Showing {{ $review->firstItem() }} to {{ $review->lastItem() }} of {{ $review->total() }} results
                                @else
                                    No results found
                                @endif
                            </div>

                            <!-- Right: Pagination links -->
                            <div>
                                {{ $review->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
