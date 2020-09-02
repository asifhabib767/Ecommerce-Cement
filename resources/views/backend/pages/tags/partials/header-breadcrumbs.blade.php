<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.tags.index'))
                    Tag List
                @elseif(Route::is('admin.tags.create'))
                    Create New Tag    
                @elseif(Route::is('admin.tags.edit'))
                    Edit Tag <span class="badge badge-info">{{ $tag->title }}</span>
                @elseif(Route::is('admin.tags.show'))
                    View Tag <span class="badge badge-info">{{ $tag->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.tags.edit', $tag->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.tags.index'))
                            <li class="breadcrumb-item active" aria-current="page">Tag List</li>
                        @elseif(Route::is('admin.tags.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tag List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Tag</li>
                        @elseif(Route::is('admin.tags.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tag List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Tag</li>
                        @elseif(Route::is('admin.tags.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tag List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Tag</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>