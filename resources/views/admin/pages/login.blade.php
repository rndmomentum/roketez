@if(!isset(Auth::guard('admin')->user()->email))
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin | Roketez</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/admin/signin.css') }}" rel="stylesheet">
    </head>
    <body class="text-center">
        <form class="form-signin" action="{{ url('admin/login/post') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <img class="mb-4" src="{{ asset('image/roketez-logo.png') }}" alt="Roketez" width="100%">

            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif

            <label class="sr-only">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Email address" required autofocus>

            <label class="sr-only">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">All Right Reserved &copy; {{ date('Y') }} Roketez</p>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
    </script>
</html>
@else 
  <script>
      location.replace("{{ url('admin') }}");
  </script>
@endif
