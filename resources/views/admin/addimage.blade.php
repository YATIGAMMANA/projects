@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Location Image</h1>

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus"></i>
            Add New Location Image
        </div>
        <div class="card-body">
            <!-- Form to submit data -->
            <form action="{{ route('location-images.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Enter the title" required>   
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter image description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Longitude</label>
                    <input class="form-control" type="text" id="longitude" name="longitude" placeholder="Enter the Longitude" required>   
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">latitude</label>
                    <input class="form-control" type="text" id="latitude" name="latitude" placeholder="Enter the latitude" required>   
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Select Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Image</button>
            </form>
        </div>
    </div>
</div>

@endsection



