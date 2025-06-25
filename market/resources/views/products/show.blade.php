@extends('layout')

@section('title', $product->name)

@section('main_content')
    <h1>{{ $product->name }}</h1>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> {{ $product->price }} $</p>
    <p><strong>Category:</strong> {{ $product->category->name }}</p>
   
 <form action="{{ route('cart.store') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
    
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="1" min="1">

    <button type="submit">Add to Cart</button>
</form>

@endsection
