@extends('backend.pages.documents.index')

@section('gallary-content')
<div>
  <div class="filter-container p-0 row">
    @foreach($gallary_videos as $video)
    <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
        <video class="video-gallary mb-2" controls>
            <source  src="{{URL::asset("public/assets/backend/gallary/$video->file")}}" type="video/mp4">
      </video>
    </div>
    @endforeach
  </div>
</div>
    
@endsection