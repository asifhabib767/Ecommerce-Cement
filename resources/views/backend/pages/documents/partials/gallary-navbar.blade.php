<div class="btn-group w-100 mb-2">
    <a class="btn btn-info " href="{{ route('admin.documents.index') }}" data-filter=""> All items </a>
    <a class="btn btn-info {{ Route::is('admin.documents.images') ? 'active' : null }}" href="{{ route('admin.documents.images') }}"> Images </a>
    <a class="btn btn-info" href="{{ route('admin.documents.videos') }}"> Videos </a>
    <a class="btn btn-info" href="javascript:void(0)" data-filter="3">Documents</a>
    <a class="btn btn-info" href="javascript:void(0)" data-filter="4">Audio</a>
  </div>