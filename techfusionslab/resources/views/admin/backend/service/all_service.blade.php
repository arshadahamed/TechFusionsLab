@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">All Services </h4>
                </div>
            </div>

            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0">All Services</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
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
                                    @foreach ( $services as $key=> $item )
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->number }}</td>
                                            <td><img src="{{ asset($item->icon) }}" style="width: 61px; height:60px;"></td>
                                            <td>{{ Str::limit($item->description, 50,'...') }}</td>
                                            <td>{{ $item->link }}</td>
                                            <td><img src="{{ asset($item->hover_image) }}" style="width: 61px; height:60px;"></td>
                                            <td>
                                                <a href="{{ route('edit.service', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <a href="{{ route('delete.service', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
