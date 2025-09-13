@extends('admin.admin_master')
@section('admin')
<div class="content">

    <div class="container-xxl">

        <!-- Header -->
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Emails</h4>
            </div>
        </div>

        <!-- Emails Table -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">All Emails</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($emails as $key => $item)
                                        <tr>
                                            <td>{{ $emails->firstItem() + $key }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ Str::limit($item->message, 50, '...') }}</td>
                                            <td>
                                                <a href="{{ route('delete.email', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No emails found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Responsive Modern Pagination -->
                        <div class="mt-3">
                            <nav>
                                <ul class="pagination justify-content-center flex-wrap">
                                    {{-- Previous Page Link --}}
                                    @if ($emails->onFirstPage())
                                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $emails->previousPageUrl() }}">Previous</a></li>
                                    @endif

                                    {{-- Page Links --}}
                                    @foreach ($emails->getUrlRange(1, $emails->lastPage()) as $page => $url)
                                        <li class="page-item {{ $emails->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($emails->hasMorePages())
                                        <li class="page-item"><a class="page-link" href="{{ $emails->nextPageUrl() }}">Next</a></li>
                                    @else
                                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


@endsection
