@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Carousels</h2>
    <a href="{{ route('admin.carousels.create') }}" class="btn btn-primary mb-3">Add New Carousel</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Caption</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carousels as $carousel)
            <tr>
                <td>{{ $carousel->id }}</td>
                <td><img src="{{ asset('storage/' . $carousel->image) }}" alt="Carousel Image" style="width: 100px;"></td>
                <td>{{ $carousel->caption }}</td>
                <td>
                    <a href="{{ route('admin.carousels.edit', $carousel->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.carousels.destroy', $carousel->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
