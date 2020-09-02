@extends('backend.pages.documents.index')

@section('gallary-content')
<div>
  <div class="filter-container p-0 row">
    @foreach($gallary_images as $image)
    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
      <a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white">
        <img src="{{ url('public/assets/backend/gallary/'.$image->file) }}" class="img-fluid mb-2" alt="white sample"/>
      </a>
    </div>
    @endforeach
  </div>
</div>
    
@endsection