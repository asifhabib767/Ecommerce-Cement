@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sliders.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sliders.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
                <div class="form-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Slider Title</label>
                                    <br>
                                    {{ $slider->title }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="slug">Short URL</label>
                                    <br>
                                    {{ $slider->slug }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="image">Slider Featured Image</label>
                                    <br>
                                    @if ($slider->image != null)
                                    <img src="{{ asset('public/assets/images/sliders/'.$slider->image) }}" alt="Image" class="img width-100" />
                                    @else 
                                    <span class="border p-2">
                                        No Image
                                    </span>
                                    @endif
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_button_enable">Enable Button</label>
                                    <br>
                                    {{ $slider->is_button_enable === 1 ? 'Enabled' : 'Disabled' }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="button_text">Button Text</label>
                                    @if ($slider->button_text != null)
                                    <div>
                                        {!! $slider->button_text !!}
                                    </div>
                                    @else 
                                    <div>
                                        Null
                                    </div>
                                    @endif
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="button_link">Button Link</label>
                                    @if ($slider->button_link != null)
                                    <div>
                                        {!! $slider->button_link !!}
                                    </div>
                                    @else 
                                    <div>
                                        Null
                                    </div>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_blank_redirect">Redirect Blank</label>
                                    <br>
                                    {{ $slider->is_blank_redirect === 1 ? 'Yes' : 'No' }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label class="control-label" for="is_description_enable">Enable Description</label>
                                    <br>
                                    {{ $slider->is_description_enable === 1 ? 'Yes' : 'No' }}
                                </div>
                            </div>
                        </div>
                    
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="short_description">Slider Short Description</label>
                                    <div>
                                        {!! $slider->short_description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label class="control-label" for="status">Status</label>
                                    <br>
                                    {{ $slider->status === 1 ? 'Active' : 'Inactive' }}
                                </div>
                                <div class="form-actions">
                                    <div class="card-body">
                                        <a  class="btn btn-success" href="{{ route('admin.sliders.edit', $slider->id) }}"> <i class="fa fa-edit"></i> Edit Now</a>
                                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-dark ml-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
    </script>
@endsection