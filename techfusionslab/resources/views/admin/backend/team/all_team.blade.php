@extends('admin.admin_master')
@section('admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Team Members</h4>
            </div>
        </div>

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Team Members List</h5>
                    </div>

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Social</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $key => $team)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->position }}</td>
                                    <td>{{ $team->email }}</td>
                                    <td>{{ $team->phone }}</td>
                                    <td>
                                        <img src="{{ $team->image ? asset($team->image) : url('upload/no_image.jpg') }}" alt="Team Image" class="rounded-circle" style="width:50px; height:50px;">
                                    </td>
                                    <td>
                                        @if($team->facebook)
                                            <a href="{{ $team->facebook }}" target="_blank" class="text-primary me-1"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if($team->twitter)
                                            <a href="{{ $team->twitter }}" target="_blank" class="text-info me-1"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if($team->linkedin)
                                            <a href="{{ $team->linkedin }}" target="_blank" class="text-primary me-1"><i class="fab fa-linkedin-in"></i></a>
                                        @endif
                                        @if($team->youtube)
                                            <a href="{{ $team->youtube }}" target="_blank" class="text-danger me-1"><i class="fab fa-youtube"></i></a>
                                        @endif
                                        @if($team->instagram)
                                            <a href="{{ $team->instagram }}" target="_blank" class="text-danger"><i class="fab fa-instagram"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($team->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.team', $team->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ route('delete.team', $team->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $teams->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Delete Confirmation -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).on('click', '#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
            }
        })
    });
</script>
@endsection
