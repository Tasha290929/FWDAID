@extends('layout')
@section('title')
Review
@endsection
@section('main_content')
<h1>Form Review</h1>
<br />

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="/review/check">
    @csrf
    <input type="email" name="email" id="email" placeholder="Paste your email" class="form-control" />
    <input type="text" name="subject" id="subject" placeholder="Title review" class="form-control" />
    <textarea name="message" id="message" class="form-control" placeholder="Wrote message" /> </textarea><br />
    <button type="submit" class="btn btn-success">Send</button>
</form>

<h1>All reviews</h1>
@foreach ($reviews as $element)
<div class="alert alert-warning">
    <h3>{{$element->subject}} </h3>
    <b>{{$element->email}}</b>
    <p>{{$element->message}}</p>
    <br/>
</div>
@endforeach
@endsection