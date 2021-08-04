<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Roketez</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body.login-body{
            height:100%;
            padding-top: 70px;
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
          <div class="col-md-4 my-auto mx-auto">
             <div class="login-box">
                <h5>Create a account to start your membership.</h5>
                <p>
                    Just a few more steps and you're done! <br>
                    We hate paperwork, too.
                </p>
                <form class="form-signin" action="{{ route('register') }}" method="post" class="needs-validation" novalidate>
                    @csrf

                    <!-- Firstname -->
                    <div class="form-group">
                        <input type="text" id="firstname" class="@error('firstname') is-invalid @enderror form-control" value="{{ old('firstname') }}" name="firstname" placeholder="Enter Firstname" required autofocus>
                        @error('firstname')
                            <span class="invalid-feedback mt-3 text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Lastname -->
                    <div class="form-group">
                        <input type="text" id="lastname" class="@error('lastname') is-invalid @enderror form-control" value="{{ old('lastname') }}" name="lastname" placeholder="Enter Lastname" required>
                        @error('lastname')
                            <span class="invalid-feedback mt-3 text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <input type="email" id="email" class="@error('email') is-invalid @enderror form-control" name="email" placeholder="Enter Email" required>
                        @error('email')
                            <span class="invalid-feedback mt-3 text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <input type="text" id="phonenumber" class="@error('phonenumber') is-invalid @enderror form-control" value="{{ old('phonenumber') }}" name="phonenumber" onkeypress="return onlyNumberKey(event)" placeholder="Enter Phone Number" required>
                        @error('phonenumber')
                            <span class="invalid-feedback mt-3 text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <input type="password" id="password" class="@error('password') is-invalid @enderror form-control" name="password" placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback mt-3 text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" required>
                    </div>

                    <p class="mt-5 text-center">
                        Have a account? <a href="{{ route('login') }}">Sign in now</a>
                    </p>

                   <button class="btn btn-lg btn-danger rounded-pill btn-block" type="submit">Continue</button>
                </form>
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
    <script> 
        function onlyNumberKey(evt) { 
            // Only ASCII charactar in that range allowed 
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
                return false; 
            return true; 
        } 
    </script> 
</html>