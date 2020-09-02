@extends('backend.layouts.master')

@section('title')
@include('backend.pages.documents.partials.title')
@endsection

@section('admin-content')
<div class="container-fluid">
    @include('backend.layouts.partials.messages')
    <div class="create-page">
        <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data"
            data-parsley-validate data-parsley-focus="first">
            @csrf
            <div class="form-body">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="title"> Title <span class="required">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title') }}" placeholder="Enter Title" required="" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="type">Video Type <span class="required">*</span></label>
                                <select class="form-control custom-select" id="type" name="type" required>
                                    @foreach($file_types as $file_type)
                                    <option value="{{$file_type }}">{{$file_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="link_type">Link Type <span class="required">*</span></label>
                                <select class="form-control custom-select" id="link_type" name="link_type" required>
                                    @foreach($link_types as $link_type)
                                    <option value="{{$link_type }}">{{$link_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="description">Description<span class="required">*</span></label>
                                <textarea type="text" class="form-control tinymce_advance" id="description" name="description" value="{{ old('description') }}" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="file">File <span
                                        class="optional">(optional)</span></label>
                                {{-- <textarea type="text" class="form-control" id="summernote" name="file"
                                    value="{{ old('file') }}"></textarea> --}}
                                    <input type="file" class="form-control" name="file" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="meta_description"> Meta Description <span
                                        class="optional">(optional)</span></label>
                                <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                    value="{{ old('meta_description') }}"
                                    placeholder="Meta description for SEO"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="meta-title">Meta Title<span
                                    class="optional">(optional)</span></label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                    value="{{ old('meta_title') }}" placeholder="Meta Title for SEO"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="width">Width<span
                                    class="optional">(optional)</span></label>
                                <input type="text" class="form-control" id="width" name="width"
                                    value="{{ old('width') }}" placeholder="Enter Media Width Here"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="height">Height<span
                                    class="optional">(optional)</span></label>
                                <input type="text" class="form-control" id="height" name="height"
                                    value="{{ old('height') }}" placeholder="Enter Media Height Here"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="size">Size<span
                                    class="optional">(optional)</span></label>
                                <input type="text" class="form-control" id="size" name="size"
                                    value="{{ old('size') }}" placeholder="eg: 2000kb=2MB"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="extension">Extension<span
                                    class="optional">(optional)</span></label>
                                <input type="text" class="form-control" id="extension" name="extension"
                                    value="{{ old('extension') }}" placeholder="eg: .mp4,jpg"/>
                            </div>
                        </div>
                    </div>


                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>
                                        Save</button>
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-dark">Cancel</a>
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
    $(".categories_select").select2({
        placeholder: "Select a Category"
    });
   
    $(document).ready(function() {
        $('#summernote').summernote();
    });
 
</script>
@endsection