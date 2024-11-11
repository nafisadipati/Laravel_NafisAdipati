<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .navbar-nav {
            display: flex;
            gap: 30px;
        }
        .navbar-nav .nav-link {
            padding: 8px 12px;
            text-decoration: none;
            color: black;
        }
        .navbar-nav .nav-link.active {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }
        .logout-btn {
            padding: 8px 12px;
        }
    </style>
</head>
<body>
@if(Auth::check())
<div class="navbar bg-light">
    <div class="navbar-nav">
        <a class="nav-link @if(request()->is('hospitals*')) active @endif" href="{{ route('hospitals.index') }}">Hospital</a>
        <a class="nav-link @if(request()->is('patients*')) active @endif" href="{{ route('patients.index') }}">Patient</a>
    </div>
    <form action="{{ route('logout') }}" method="POST" class="logout-btn">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endif

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
