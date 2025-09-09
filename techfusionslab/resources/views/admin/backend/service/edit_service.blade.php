@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Service</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('update.service', $service->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="form-label">Title</label>
                                <input class="form-control" type="text" name="title" value="{{ $service->title }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Number</label>
                                <input class="form-control" type="text" name="number" value="{{ $service->number }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Icon</label>
                                <input class="form-control" type="file" name="icon" id="icon">
                                <img id="showIcon" src="{{ asset($service->icon) }}" class="rounded-circle avatar-xxl img-thumbnail mt-2" alt="icon">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Hover Image</label>
                                <input class="form-control" type="file" name="hover_image" id="hover_image">
                                <img id="showHover" src="{{ asset($service->hover_image) }}" class="rounded-circle avatar-xxl img-thumbnail mt-2" alt="hover image">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ $service->description }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Link</label>
                                <input class="form-control" type="text" name="link" value="{{ $service->link }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#icon').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showIcon').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        $('#hover_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showHover').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
