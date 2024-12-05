@extends('layout')
@section('title', $category->name)

@section('main_content')
<h1>Products in {{ $category->name }}</h1>
<ul>
    @foreach ($products as $product)
        <li>
            <strong>{{ $product->name }}</strong>: {{ $product->description }} ({{ $product->price }} $)
        </li>
    @endforeach
</ul>
@endsection
