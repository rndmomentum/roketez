<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Roketez</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body.login-body{
            height:100%;
            padding-top: 50px;
        }
        .c-padding-top{
          padding-top: 70px;
        }
        .c-padding-bottom{
          padding-bottom: 100px;
        }
        .c-padding-right{
          padding-right: 50px;
        }
        .c-padding-left{
          padding-left: 50px;
        }
        .footer-top-bottom{
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body class="login-body">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-md-5 my-auto mx-auto">
             <div class="card shadow rounded mt-5">
               <div class="card-body c-padding-left c-padding-right c-padding-top c-padding-bottom">
                  <h3>Sign In</h3>
                  <hr>
                  <form class="form-signin" action="{{ route('login') }}" method="post" class="needs-validation" novalidate>
                      @csrf
                      <div class="form-group">
                        <input type="email" id="email" class="@error('email') is-invalid @enderror form-control form-control-lg" name="email" placeholder="Email address" required autofocus>
                          @error('email')
                              <span class="invalid-feedback mt-3 text-center" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                        <input type="password" class="@error('password') is-invalid @enderror form-control form-control-lg" name="password" placeholder="Password" required>
                          @error('password')
                            <span class="invalid-feedback mt-3 text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>

                      <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" checked> Remember me
                        </label>
                      </div>

                    <button class="btn btn-lg btn-danger rounded-pill btn-block mt-3" type="submit">Sign In</button>

                    <p class="mt-5 text-center">
                      New to Roketez? <a href="{{ route('register') }}">Sign up now</a>
                    </p>
                  </form>
               </div>
             </div>
             <!-- Footer -->
            <footer class="text-center footer-top-bottom">
              <small class="text-muted">All Right Reserved © 2020 Roketez</small>
            </footer>
          </div>
       </div>
    </div>
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