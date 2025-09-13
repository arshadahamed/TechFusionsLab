@extends('admin.admin_master')
@section('admin')
<div class="content">

    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add FAQ</h4>
            </div>
            <div class="mt-2 mt-sm-0">
                <a href="{{ route('all.faqs') }}" class="btn btn-secondary">Back to FAQ List</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="card border mb-0">

                            <div class="card-header">
                                <h4 class="card-title mb-0">Add FAQ</h4>
                            </div>

                            <form action="{{ route('store.faq') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group mb-3 row">
                                        <label class="form-label col-12">Question</label>
                                        <div class="col-12">
                                            <input type="text"
                                                   name="question"
                                                   class="form-control @error('question') is-invalid @enderror"
                                                   value="{{ old('question') }}"
                                                   placeholder="Enter your question">
                                            @error('question')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group mb-3 row">
                                        <label class="form-label col-12">Answer</label>
                                        <div class="col-12">
                                            <textarea name="answer"
                                                      class="form-control @error('answer') is-invalid @enderror"
                                                      rows="4"
                                                      placeholder="Enter the answer">{{ old('answer') }}</textarea>
                                            @error('answer')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group d-flex gap-2">
                                        <button type="submit" class="btn btn-primary" name="action" value="save">Save FAQ</button>
                                        <button type="submit" class="btn btn-success" name="action" value="save_add">Save & Add New</button>
                                    </div>

                                </div>
                            </form>

                        </div> <!-- end card -->

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
