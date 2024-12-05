@extends('layout')
@section('title', $category->name)

@section('main_content')
<h1>Products in {{ $category->name }}</h1>
<ul>
    @foreach ($products as $product)
    <li>
            <a href="{{ route('products.show', $product->id) }}">
                <strong>{{ $product->name }}</strong>
            </a>: ({{ $product->price }} $)
        </li>
    @endforeach
</ul>
@endsection
