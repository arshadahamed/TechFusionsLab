@extends('admin.admin_master')
@section('admin')
<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Trashed FAQs</h4>
            </div>
            <div class="mt-2 mt-sm-0">
                <a href="{{ route('all.faqs') }}" class="btn btn-secondary">Back to FAQ List</a>
            </div>
        </div>

        <!-- Trashed FAQs Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Trashed FAQs</h5>
                    </div>

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>
                                        <td>
                                            <a href="{{ route('faq.restore', $faq->id) }}" class="btn btn-info btn-sm">Restore</a>
                                            <a href="{{ route('faq.forceDelete', $faq->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $faqs->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
