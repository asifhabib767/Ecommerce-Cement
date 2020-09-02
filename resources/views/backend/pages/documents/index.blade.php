@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.documents.partials.title')
@endsection

@section('admin-content')

    @include('backend.pages.documents.partials.styles')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  FilterizR Gallery with Ekko Lightbox
                </div>
              </div>
              <div class="card-body">
                <div>

                  @include('backend.pages.documents.partials.gallary-navbar')

                  <div class="mb-2">
                      <a class="btn btn-secondary" href="{{ route('admin.documents.create') }}" data-shuffle> Add New</a>
                      <div class="float-right">
                        <select class="custom-select" style="width: auto;" data-sortOrder>
                          <option value="index"> Sort by Position </option>
                          <option value="sortData"> Sort by Custom Data </option>
                        </select>
                        <div class="btn-group">
                          <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                          <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                        </div>
                      </div>
                    </div>

                 
                  @yield('gallary-content')

              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

      

</div>
<!-- ./wrapper -->
@endsection

@include('backend.pages.documents.partials.scripts')
@section('scripts')
<script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });
  
      $('.filter-container').filterizr({gutterPixels: 3});
      $('.btn[data-filter]').on('click', function() {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
@endsection
