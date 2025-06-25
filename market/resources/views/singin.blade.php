@extends('layout')
@section('title')
Sing In
@endsection

@section('main_content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-body-tertiary">
  <form method="POST" action="/singin/check" class="p-4 shadow rounded bg-white" style="width: 100%; max-width: 400px;">
    @csrf

    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

    <div class="form-floating mb-3">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
      @error('email')
      <p>{{ $message }}</p>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
      @error('password')
      <p>{{ $message }}</p>
      @enderror
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</div>
@endsection