@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    <!-- Add links to carousel management here -->
    <a href="{{ route('admin.carousels.index') }}" class="btn btn-primary mt-3">Manage Carousels</a>
</div>
@endsection
