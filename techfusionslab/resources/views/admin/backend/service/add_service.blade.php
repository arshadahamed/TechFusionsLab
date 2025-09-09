@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Service</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="tab-pane pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h4 class="card-title mb-0">Add Service</h4>
                                                </div>
                                            </div>
                                        </div>

                                        @php
                                            $lastService = \App\Models\Service::latest('number')->first();
                                            $nextNumber = $lastService ? ((int)$lastService->number + 1) : 1;
                                        @endphp

                                        <form action="{{ route('store.service') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="card-body">

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Title</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="title" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Number</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="number" value="{{ $nextNumber }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Icon</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="file" name="icon" id="icon">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Description</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <textarea name="description" class="form-control" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Link</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="link">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Hover Image</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="file" name="hover_image" id="hover_image">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Icon Preview</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                            class="rounded avatar-xl img-thumbnail float-start" alt="Icon Preview">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3 row">
                                                    <label class="form-label">Hover Image Preview</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <img id="showHoverImage" src="{{ url('upload/no_image.jpg') }}"
                                                            class="rounded avatar-xl img-thumbnail float-start" alt="Hover Image Preview">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Save Changes</button>

                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- end education -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(target).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#icon').change(function() {
            readURL(this, '#showImage');
        });

        $('#hover_image').change(function() {
            readURL(this, '#showHoverImage');
        });
    });
</script>
@endsection
