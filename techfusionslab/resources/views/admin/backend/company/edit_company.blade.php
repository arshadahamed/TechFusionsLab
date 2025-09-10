@extends('admin.admin_master')
@section('admin')

<div class="content">
    <div class="container-xxl">
        <div class="py-3 d-flex justify-content-between align-items-center">
            <h4 class="fw-semibold m-0">Edit Company Information</h4>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <form action="{{ route('update.info', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Company Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $company->company_name) }}">
                </div>

                <!-- White Logo -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">White Logo</label>
                    <input type="file" name="white_logo" class="form-control">
                    @if($company->white_logo)
                        <img src="{{ asset('storage/'.$company->white_logo) }}" alt="White Logo" class="mt-2" height="60">
                    @endif
                </div>

                <!-- Dark Logo -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Dark Logo</label>
                    <input type="file" name="dark_logo" class="form-control">
                    @if($company->dark_logo)
                        <img src="{{ asset('storage/'.$company->dark_logo) }}" alt="Dark Logo" class="mt-2" height="60">
                    @endif
                </div>

                <!-- Favicon -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Favicon</label>
                    <input type="file" name="favicon" class="form-control">
                    @if($company->favicon)
                        <img src="{{ asset('storage/'.$company->favicon) }}" alt="Favicon" class="mt-2" height="40">
                    @endif
                </div>

                <!-- Slug -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug (auto-generated)</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $company->slug) }}" readonly>
                </div>

                <!-- SEO Fields -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $company->meta_title) }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="form-control">{{ old('meta_description', $company->meta_description) }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Meta Keywords (comma separated)</label>
                    <textarea name="meta_keywords" rows="2" class="form-control">{{ old('meta_keywords', $company->meta_keywords) }}</textarea>
                </div>


                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control">{{ old('description', $company->description) }}</textarea>
                </div>

                <!-- Contact Details -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone One</label>
                    <input type="text" name="phone_one" class="form-control" value="{{ old('phone_one', $company->phone_one) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Two</label>
                    <input type="text" name="phone_two" class="form-control" value="{{ old('phone_two', $company->phone_two) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email One</label>
                    <input type="email" name="email_one" class="form-control" value="{{ old('email_one', $company->email_one) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email Two</label>
                    <input type="email" name="email_two" class="form-control" value="{{ old('email_two', $company->email_two) }}">
                </div>

                <!-- Address -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control">{{ old('address', $company->address) }}</textarea>
                </div>

                <!-- Map -->
                <div class="col-md-12 mb-3">
                    <label class="form-label">Google Map Iframe</label>
                    <input type="text" name="map_iframe" class="form-control" value="{{ old('map_iframe', $company->map_iframe) }}">
                </div>

                <!-- Social Links -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $company->facebook) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $company->twitter) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin', $company->linkedin) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">YouTube</label>
                    <input type="text" name="youtube" class="form-control" value="{{ old('youtube', $company->youtube) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $company->instagram) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">TikTok</label>
                    <input type="text" name="tiktok" class="form-control" value="{{ old('tiktok', $company->tiktok) }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>

@endsection
