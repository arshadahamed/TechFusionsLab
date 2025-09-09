@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Hero Section</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="tab-pane pt-4" id="hero_setting" role="tabpanel" aria-labelledby="setting_tab">
                            <div class="row">

                                <div class="col-lg-12 col-xl-12">
                                    <div class="card border mb-0">

                                        <div class="card-header">
                                            <h4 class="card-title mb-0">Edit Hero Section</h4>
                                        </div>

                                        <form action="{{ route('update.hero', $hero->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $hero->id }}">
                                            <div class="card-body">

                                                <!-- Title -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="title">Title</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="title" id="title" value="{{ $hero->title }}" required>
                                                    </div>
                                                </div>

                                                <!-- Highlight -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="highlight">Highlight Text</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="highlight" id="highlight" value="{{ $hero->highlight }}">
                                                    </div>
                                                </div>

                                                <!-- Description -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="description">Description</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <textarea name="description" id="description" class="form-control" rows="5">{{ $hero->description }}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Button Text -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="button_text">Button Text</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="button_text" id="button_text" value="{{ $hero->button_text }}">
                                                    </div>
                                                </div>

                                                <!-- Button Link -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="button_link">Button Link</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="text" name="button_link" id="button_link" value="{{ $hero->button_link }}">
                                                    </div>
                                                </div>

                                                <!-- Background Image -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="bg_image">Background Image</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="file" name="bg_image" id="bg_image" accept="image/*">
                                                    </div>
                                                </div>

                                                <!-- Main Image -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="main_image">Main Hero Image</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="file" name="main_image" id="main_image" accept="image/*">
                                                    </div>
                                                </div>

                                                <!-- Map Image -->
                                                <div class="form-group mb-3 row">
                                                    <label class="form-label" for="map_image">Map Image</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input class="form-control" type="file" name="map_image" id="map_image" accept="image/*">
                                                    </div>
                                                </div>

                                                <!-- Image Previews -->
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        <p>Background Image Preview:</p>
                                                        <img id="showBgImage" src="{{ $hero->bg_image ? asset($hero->bg_image) : asset('frontend/assets/img/default-image.png') }}" class="img-thumbnail mb-2" alt="bg image">

                                                        <p>Main Hero Image Preview:</p>
                                                        <img id="showMainImage" src="{{ $hero->main_image ? asset($hero->main_image) : asset('frontend/assets/img/default-image.png') }}" class="img-thumbnail mb-2" alt="main image">

                                                        <p>Map Image Preview:</p>
                                                        <img id="showMapImage" src="{{ $hero->map_image ? asset($hero->map_image) : asset('frontend/assets/img/default-image.png') }}" class="img-thumbnail mb-2" alt="map image">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Save Changes</button>

                                            </div><!--end card-body-->
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div> <!-- end tab-pane -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Live Image Preview Scripts -->
<script>
    $(function() {
        function previewImage(input, targetId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $(targetId).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#bg_image').change(function() { previewImage(this, '#showBgImage'); });
        $('#main_image').change(function() { previewImage(this, '#showMainImage'); });
        $('#map_image').change(function() { previewImage(this, '#showMapImage'); });
    });
</script>
@endsection
