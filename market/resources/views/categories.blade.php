@extends('layout')
@section('title', 'Categories')

@section('main_content')
<h1>Categories</h1>
<ul>
    @foreach ($categories as $category)
        <li><a href="{{ route('products', $category->id) }}">{{ $category->name }}</a></li>
    @endforeach
</ul>
@endsection
