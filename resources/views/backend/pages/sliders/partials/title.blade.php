@if (Route::is('admin.sliders.index'))
Sliders 
@elseif(Route::is('admin.sliders.create'))
Create New Slider
@elseif(Route::is('admin.sliders.edit'))
Edit Slider {{ $slider->title }}
@elseif(Route::is('admin.sliders.show'))
View Slider {{ $slider->title }}
@endif
| Admin Panel - 
{{ config('app.name') }}