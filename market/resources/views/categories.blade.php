@extends('layout')
@section('title', 'Categories')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Product Categories</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($categories as $category)
        <div class="col">
            <div class="card h-100 shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <a href="{{ route('products', $category->id) }}" class="btn btn-outline-primary mt-3">View Products</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
