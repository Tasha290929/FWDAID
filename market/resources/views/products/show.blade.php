@extends('layout')

@section('title', $product->name)

@section('main_content')
<div class="container py-5">
    <div class="card shadow-lg p-4">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">{{ $product->name }}</h1>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Description:</strong> {{ $product->description }}</li>
                <li class="list-group-item"><strong>Price:</strong> <span class="text-success fw-bold">{{ $product->price }} $</span></li>
                <li class="list-group-item"><strong>Category:</strong> {{ $product->category->name }}</li>
            </ul>

            @auth
            <form action="{{ route('cart.store') }}" method="post" class="mt-3">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="price" value="{{ $product->price }}">

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control w-25">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-cart-plus"></i> Add to Cart
                </button>
            </form>
            @endauth

            @guest
                <p class="mt-4">To order this product, please log in to your account:</p>
                <a href="{{ route('singin') }}" class="btn btn-outline-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
            @endguest

        </div>
    </div>
</div>
@endsection
