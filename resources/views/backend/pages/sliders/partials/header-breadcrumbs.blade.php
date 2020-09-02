<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.sliders.index'))
                    Slider List
                @elseif(Route::is('admin.sliders.create'))
                    Create New Slider    
                @elseif(Route::is('admin.sliders.edit'))
                    Edit Slider <span class="badge badge-info">{{ $slider->title }}</span>
                @elseif(Route::is('admin.sliders.show'))
                    View Slider <span class="badge badge-info">{{ $slider->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.sliders.edit', $slider->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.sliders.index'))
                            <li class="breadcrumb-item active" aria-current="page">Slider List</li>
                        @elseif(Route::is('admin.sliders.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Slider List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Slider</li>
                        @elseif(Route::is('admin.sliders.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Slider List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
                        @elseif(Route::is('admin.sliders.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Slider List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Slider</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>