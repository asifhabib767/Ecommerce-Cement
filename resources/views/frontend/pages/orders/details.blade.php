@extends('frontend.layouts.master')

@section('title')
    {{ config('app.name') }} | {{ config('app.description') }}
@endsection

@section('main-content')

<main class="main">
  <div authID="1" id="order"></div>
</main>
@endsection