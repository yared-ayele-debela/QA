<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My StackOverflow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('custom_css/index.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .hover-effect:hover {
            color: #0d6efd;
            text-decoration: underline;
            transition: all 0.3s ease;
        }
    </style>

</head>
<body>

{{-- Header --}}
<nav class="navbar navbar-expand-lg text-dark shadow-md bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">MyStackOverflow</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item"><a class="nav-link" href="#">{{ Auth::user()->name }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- Main Content --}}
<div class="container my-4">
    @yield('content')
</div>

{{-- Footer --}}
<footer class="bg-dark text-white text-center py-3 mt-auto bottom-0" >
    <div class="container">
        <p class="mb-0">© {{ date('Y') }} MyStackOverflow. All rights reserved.</p>
    </div>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
