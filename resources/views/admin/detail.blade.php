<!-- resources/views/details/detail.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $locationImage->title }}</h1>
    <p>{{ $locationImage->description }}</p>
    <div>
        <h3>Images</h3>
        @foreach (explode(',', $locationImage->image) as $image)
            <img src="{{ asset('storage/assets/images/' . $image) }}" alt="{{ $locationImage->title }}" style="max-width: 100%; height: auto;">
        @endforeach
    </div>
</div>
@endsection
