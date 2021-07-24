<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password | Roketez</title>
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
                   <h3>Reset Password</h3>
                   <hr>
                    <form method="POST" action="{{ route('password.update') }}" class="login100-form validate-form p-b-33 p-t-5">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email -->
                        <div class="form-group">
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            <span class="focus-input100" data-placeholder="&#xe82a;"></span>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="form-group">
                            <input id="password" type="password" class="form-control form-conrtol-lg @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autocomplete="new-password">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control form-conrtol-lg" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                        <button class="btn btn-lg btn-danger rounded-pill btn-block mt-3" type="submit">Reset Password</button>
                    </form>
                </div>
              </div>
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
