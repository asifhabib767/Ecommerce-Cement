@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sliders.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sliders.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                @csrf
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Slider Title <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title" required=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL <span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Enter short url (Keep blank to auto generate)" />
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Slider Image <span class="optional">(optional)</span></label>
                                    <input type="file" class="form-control dropify" data-height="70" data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image" value="{{ old('image') }}"/>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_button_enable">Enable Button <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="is_button_enable" name="is_button_enable" required>
                                        <option value="1" {{ old('is_button_enable') === 1 ? 'selected' : null }}>Enabled</option>
                                        <option value="0" {{ old('is_button_enable') === 0 ? 'selected' : null }}>Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="button_text">Button Text <span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text') }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="button_link">Button Link <span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_blank_redirect">Redirect Blank <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="is_blank_redirect" name="is_blank_redirect" required>
                                        <option value="1" {{ old('is_blank_redirect') === 1 ? 'selected' : null }}>Yes</option>
                                        <option value="0" {{ old('is_blank_redirect') === 0 ? 'selected' : null }}>No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_description_enable">Enable Description <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="is_description_enable" name="is_description_enable" required>
                                        <option value="1" {{ old('is_description_enable') === 1 ? 'selected' : null }}>Yes</option>
                                        <option value="0" {{ old('is_description_enable') === 0 ? 'selected' : null }}>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="short_description">Slider Short Description <span class="optional">(optional)</span></label>
                                    <textarea type="text" class="form-control tinymce_advance" id="short_description" name="short_description" value="{{ old('short_description') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status <span class="required">*</span></label>
                                    <select class="form-control custom-select" id="status" name="status" required>
                                        <option value="1" {{ old('status') === 1 ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ old('status') === 0 ? 'selected' : null }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-dark">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    
    </script>
@endsection