<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Roketez</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- CSS here -->
    <style>
        .line-through{
            text-decoration: line-through;
        }

        .footer-top-bottom{
            padding-top: 100px;
            padding-bottom: 70px;
        }

        .dropdown-left-manual{
            right: 0;
            left: auto;
            padding-right: 150px;
        }
        .remove-hover:hover {
            background-color: initial;
        }

        .bg-hitam{
            background-color: #000000;
        }
                    
    </style>
    @yield('css')
</head>
<body class="bg-hitam">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top bg-hitam text-light shadow-md py-3 px-5">
        <a class="navbar-brand" href="{{ url('explore') }}">
            <img src="{{ asset('image/roket-ez-logo-baru-3.png') }}" class="align-items-center" style="width: 100px;" alt="Logo Roketez">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- Left -->
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active text-light" href="{{ url('explore') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light" href="{{ url('categories') }}">Categories</a>
                </li>
            </ul>

            <!-- Right -->
            <ul class="nav navbar-nav navbar-right align-items-center">
                {{-- <li class="nav-item">
                    <a class="nav-link active text-dark" href="{{ url('mycourses') }}">My Courses</a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('image/profile/avatar-image.png') }}" style="width: 42px; height: 42px;" class="rounded-circle" alt="Profile Image">
                    </a>
                    <div class="dropdown-menu dropdown-left-manual py-4" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item remove-hover" href="{{ url('myaccount') }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('image/profile/avatar-image.png') }}" style="width: 72px; height: 72px;" class="rounded-circle" alt="Profile Image">
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center" style="padding-left: 35px;">
                                            <p>
                                                <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</b> <br>
                                                {{ Auth::user()->email }}                                      
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- <small class="text-muted remove-hover dropdown-item mt-4"><b>Courses</b></small>
                        <a class="dropdown-item remove-hover" href="{{ url('mycourses') }}">My Courses</a> --}}

                        <small class="text-muted remove-hover dropdown-item mt-2"><b>Account</b></small>
                        <a class="dropdown-item remove-hover" href="{{ url('myaccount') }}">Account Settings</a>
                        <a class="dropdown-item remove-hover" href="{{ url('subscription-history') }}">Subscription History</a>

                        <small class="text-muted remove-hover dropdown-item mt-2"><b>Others</b></small>
                        <a class="dropdown-item remove-hover" href="{{ url('ticket-support') }}">Ticket Support</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item remove-hover btn bt-danger rounded-pill" href="">Sign Out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    

    <!-- Content Start Here -->
    
    <div class="container-fluid px-3 py-3">
        @yield('content')

        <!-- Footer -->
        <footer class="text-center footer-top-bottom">
            <hr class="border border-white">
            <small class="text-muted">All Right Reserved &copy; {{ date('Y') }} Roketez</small>
        </footer>
    </div>
    <!-- Footer -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/5c12e9bac7.js"></script>
@yield('js')
</html>
