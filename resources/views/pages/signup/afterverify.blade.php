<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up | Roketez</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.5/examples/pricing/pricing.css">
    <style>
        .c-p-top{
            padding-top: 150px; 
        }
        .footer-top{
            padding-top: 170px;
        }
      </style>
</head>
<body> 
    <div class="container">
        <div class="row d-flex justify-content-center c-p-top">
            <div class="col-md-5">
                <div class="d-flex justify-content-center pb-4">
                    <i class="far fa-check-circle text-danger fa-3x"></i>
                </div>
                <div class="text-center">
                    <h5 class="pb-3">Choose Your Plan</h5>
                </div>
                <div class="text-justify">
                    <p><i class="fas fa-check text-danger"></i> No commitments, cancel anytime.</p>
                    <p><i class="fas fa-check text-danger"></i> Basic courses.</p>
                    <p><i class="fas fa-check text-danger"></i> Weekly update new course.</p>
                </div>
                <a href="{{ url('signup/pricing') }}" class="btn btn-lg btn-danger rounded-pill btn-block mt-4">SEE THE PLANS</a>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center mt-4 footer-top">
            <small class="text-muted">All Right Reserved © 2020 Roketez</small>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/5c12e9bac7.js"></script>
</html>