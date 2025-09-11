@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Team Member</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('update.team', $team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $team->name }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Position</label>
                                <input class="form-control" type="text" name="position" value="{{ $team->position }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $team->email }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ $team->phone }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" name="bio">{{ $team->bio }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Facebook</label>
                                <input class="form-control" type="text" name="facebook" value="{{ $team->facebook }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Twitter</label>
                                <input class="form-control" type="text" name="twitter" value="{{ $team->twitter }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">LinkedIn</label>
                                <input class="form-control" type="text" name="linkedin" value="{{ $team->linkedin }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">YouTube</label>
                                <input class="form-control" type="text" name="youtube" value="{{ $team->youtube }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Instagram</label>
                                <input class="form-control" type="text" name="instagram" value="{{ $team->instagram }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="active" {{ $team->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ $team->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" name="image" id="image">
                                <img id="showImage" src="{{ $team->image ? asset($team->image) : url('upload/no_image.jpg') }}" class="rounded avatar-xl img-thumbnail mt-2" alt="Team Image">
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
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection
