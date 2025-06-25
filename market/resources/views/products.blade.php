@extends('layout')
@section('title', $category->name)

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Products in "{{ $category->name }}"</h1>

    @if($products->isEmpty())
        <div class="alert alert-info text-center">No products found in this category.</div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted mb-3">{{ number_format($product->price, 2) }} $</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
