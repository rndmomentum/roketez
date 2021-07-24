@if(isset(Auth::guard('admin')->user()->admin_id))
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Membantu Usahawan Onlinekan Bisnes Semudah 123">
    <meta name="author" content="Danial Adzhar">
    <title>@yield('title') | Roketez</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Script -->
    <script src="https://kit.fontawesome.com/5c12e9bac7.js" crossorigin="anonymous"></script>
    @yield('css')

    <!-- Custom CSS -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('admin') }}">Roketez</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ url('admin/logout') }}">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('admin') }}">
                            <i class="fas fa-home"></i>
                            Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @if(Auth::guard('admin')->user()->role == 'Instructor')

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/users') }}">
                            <i class="fas fa-user"></i>
                            Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/memberships') }}">
                            <i class="fas fa-user-plus"></i>
                            Memberships
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/courses') }}">
                            <i class="fas fa-book"></i>
                            Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/lessons') }}">
                            <i class="fas fa-book-open"></i>
                            Lessons
                            </a>
                        </li>
                    </ul>

                    @if(Auth::guard('admin')->user()->role == 'Instructor')

                    @elseif(Auth::guard('admin')->user()->role == 'Administrator')
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Setting</span>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/instructor') }}">
                                <i class="fas fa-flag"></i>
                                Instructor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/role') }}">
                                <i class="fas fa-user-shield"></i>
                                Admin Role
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/api-key') }}">
                                <i class="fas fa-key"></i>
                                Api Key
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/ticket-support') }}">
                                <i class="far fa-life-ring"></i>
                                Ticket Support
                                </a>
                            </li>
                        </ul>

                    @else
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Setting</span>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/ticket-support') }}">
                                <i class="far fa-life-ring"></i>
                                Ticket Support
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            </nav>

            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 pb-5">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    @yield('js')
    </body>
</html>
@else 
    <script>
        location.replace("{{ url('admin/login') }}");
    </script>
@endif
