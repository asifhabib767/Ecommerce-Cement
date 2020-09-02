@if (Route::is('admin.tags.index'))
Tags
@elseif(Route::is('admin.tags.create'))
Create New Tag
@elseif(Route::is('admin.tags.edit'))
Edit Tag {{ $tag->title }}
@elseif(Route::is('admin.tags.show'))
View Tag {{ $tag->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}