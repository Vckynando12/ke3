@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit Carousel</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($carousel->image)
                <img src="{{ asset('storage/' . $carousel->image) }}" alt="Current Image" style="width: 100px; margin-top: 10px;">
            @endif
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <input type="text" class="form-control" id="caption" name="caption" value="{{ $carousel->caption }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Carousel</button>
    </form>
</div>
@endsection
