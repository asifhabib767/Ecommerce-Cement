@if (Route::is('admin.admins.index'))
Admins 
@elseif(Route::is('admin.admins.create'))
Create New Admin
@elseif(Route::is('admin.admins.edit'))
Edit Admin - {{ $admin->first_name }}
@elseif(Route::is('admin.admins.profile.edit'))
Edit Admin Profile - {{ $admin->first_name }}
@endif
| Admin Panel - 
{{ config('app.name') }}