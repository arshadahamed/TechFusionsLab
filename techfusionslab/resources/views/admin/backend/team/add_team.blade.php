@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<div class="content">
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Team Member</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <form action="{{ route('store.team') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" name="name" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Position</label>
                                <input class="form-control" type="text" name="position">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" name="email">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Phone</label>
                                <input class="form-control" type="text" name="phone">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Bio</label>
                                <textarea name="bio" class="form-control"></textarea>
                            </div>

                            <!-- Social Links with Icons -->
                            <div class="form-group mb-3 d-flex align-items-center">
                                <i class="fab fa-facebook-f me-2 text-primary"></i>
                                <input class="form-control" type="text" name="facebook" placeholder="Facebook URL">
                            </div>

                            <div class="form-group mb-3 d-flex align-items-center">
                                <i class="fab fa-twitter me-2 text-info"></i>
                                <input class="form-control" type="text" name="twitter" placeholder="Twitter URL">
                            </div>

                            <div class="form-group mb-3 d-flex align-items-center">
                                <i class="fab fa-linkedin-in me-2 text-primary"></i>
                                <input class="form-control" type="text" name="linkedin" placeholder="LinkedIn URL">
                            </div>

                            <div class="form-group mb-3 d-flex align-items-center">
                                <i class="fab fa-youtube me-2 text-danger"></i>
                                <input class="form-control" type="text" name="youtube" placeholder="YouTube URL">
                            </div>

                            <div class="form-group mb-3 d-flex align-items-center">
                                <i class="fab fa-instagram me-2 text-danger"></i>
                                <input class="form-control" type="text" name="instagram" placeholder="Instagram URL">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Image</label>
                                <input class="form-control" type="file" name="image" id="image">
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded avatar-xl img-thumbnail mt-2" alt="Team Image Preview">
                            </div>

                            <button type="submit" class="btn btn-primary">Save Team Member</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection
