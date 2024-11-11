@extends('layouts.app')

@section('content')
<h2>Login</h2>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection
