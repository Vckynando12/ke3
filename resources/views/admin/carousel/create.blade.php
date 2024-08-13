@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Add New Carousel</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.carousels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-control" id="caption" name="caption" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Carousel</button>
    </form>
</div>
@endsection
