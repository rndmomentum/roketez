<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email | Roketez</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .c-p-top{
            padding-top: 120px;
        }
        .c-p-bottom{
            padding-bottom: 50px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center c-p-top">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-danger text-white">{{ __('Verify Your Email Address') }}</div>
    
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="fixed-bottom text-center c-p-bottom">
            <small class="text-muted">MOMENTUM INTERNET SDN BHD (1079998-A) © 2020 ALL RIGHTS RESERVED</small>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
