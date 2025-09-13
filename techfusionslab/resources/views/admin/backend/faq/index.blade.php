@extends('admin.admin_master')
@section('admin')
<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All FAQs</h4>
            </div>
            <div class="mt-2 mt-sm-0">
                <form action="{{ route('all.faqs') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Search FAQ..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary btn-sm ms-2">Search</button>
                </form>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All FAQs</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $key => $item)
                                <tr>
                                    <td>{{ $faqs->firstItem() + $key }}</td>
                                    <td>{{ $item->question }}</td>
                                    <td>{{ $item->answer }}</td>
                                    <td>
                                        <a href="{{ route('edit.faq', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('delete.faq', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No FAQs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Modern Pagination -->
                        <div class="mt-3">
                           {{ $faqs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
