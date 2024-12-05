@extends('layout')

@section('title', $product->name)

@section('main_content')
    <h1>{{ $product->name }}</h1>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Price:</strong> {{ $product->price }} $</p>
    <p><strong>Category:</strong> {{ $product->category->name }}</p>
@endsection
