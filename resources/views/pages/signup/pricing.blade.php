<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing | Roketez</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.5/examples/pricing/pricing.css">
    <style>
        .c-p-top{
            padding-top: 50px; 
        }

        .header-top{
            padding-top: 100px; 
        }

      </style>
</head>
<body> 
    <div class="text-center header-top">
        <h4>Choose the plan that’s right for you.</h4>
        <p>You can cancel your subscription at any time.</p>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="card-deck c-p-top text-center">
                    <!-- Standard Plans -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">{{ $plan->title }} Plan</h4>
                        </div>
                        <div class="card-body py-4">
                            <h1 class="card-title pricing-card-title">RM {{ $plan->sales_price }} <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><i class="fas fa-check"></i> Access all entire videos</li>
                                <li><i class="fas fa-check"></i> New videos updated weekly</li>
                                <li><i class="fas fa-check"></i> Different trainers all the time</li>
                            </ul>
                            <a href="{{ url('signup/payment') }}/{{ $plan->membership_id }}" class="btn btn-lg btn-block btn-danger rounded-pill">Get started</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <!-- Footer -->
        <footer class="text-center mt-4">
            <small class="text-muted">All Right Reserved &copy; {{ date('Y') }} Roketez</small>
        </footer>
    </div>
</body>
<script src="https://kit.fontawesome.com/5c12e9bac7.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>