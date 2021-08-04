<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment | Roketez</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.5/examples/pricing/pricing.css">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center c-p-top-bottom">
            <div class="col-md-5">
                <div class="pb-3">

                    <!-- Alerts -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Sorry!</strong> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <h4>Set up your credit or debit card.</h4>
                    <span class="logos logos-block">
                        <img alt="Visa" class="logoIcon VISA" data-uia="logoIcon-VISA" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/svg/visa-v2.svg">
                        <img alt="Mastercard" class="logoIcon MASTERCARD" data-uia="logoIcon-MASTERCARD" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/svg/mastercard-v2.svg">
                        <img alt="Amex" class="logoIcon AMEX" data-uia="logoIcon-AMEX" src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/svg/amex-v2.svg">
                    </span>
                </div>
                <form action="{{ url('checkout/membership') }}/{{ $membership->membership_id }}" method="POST" data-stripe-publishable-key="{{ $apikey->secret_api_key }}" autocomplete="off" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cardholder Name" name="cardholder" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Card Number" onkeypress="return onlyNumberKey(event)" maxlength="16" name="cardnumber" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="MM" onkeypress="return onlyNumberKey(event)" min="2" maxlength="2" name="month" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="YYYY" onkeypress="return onlyNumberKey(event)" min="4" maxlength="4" name="year" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="CVC" onkeypress="return onlyNumberKey(event)" min="3" maxlength="3" name="cvc" required>
                            </div>
                        </div>
                    </div>
                    <div class="alert" style="background-color: #F2F2F2;">
                        <p class="mt-3">
                            <b>RM {{ $membership->sales_price }} /Month</b> <br>
                            <span class="text-muted">{{ $membership->title }} Plan</span>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <p class="text-muted">By clicking the checkbox you agree to subscribe to this plan. Roketez will automatically continue your membership and charge the monthly membership fee to your payment method until you cancel. You may cancel at any time to avoid future charges.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Agree" required>
                                <label class="form-check-label">
                                    I Agree
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a class="btn btn-danger rounded-pill btn-block text-decoration-none text-light" data-toggle="modal" data-target="#tnc"> START MEMBERSHIP </a>
                        </div>
                    </div>

                    <!-- Display T&C -->
                    <div class="modal fade" id="tnc" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Terms & Condition</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>1. Any subscriptions made are non -refundable.</p>
                                            <p>2. To cancel the subscription, you must cancel 1 week before the subscription renewal date.</p>
                                            <p>3. You are prohibited from recording videos found in Roketez.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="wait" style="display: none;" class="btn btn-danger btn-block" type="button" disabled>
                                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    Please Wait...
                                </button>
                                <button id="btn" type="submit" class="btn btn-danger btn-block">I Agree</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                <!-- Footer -->
                <footer class="text-center mt-4">
                    <small class="text-muted">All Right Reserved &copy; {{ date('Y') }} Roketez</small>
                </footer>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/5c12e9bac7.js"></script>
<script> 
    function onlyNumberKey(evt) { 
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
</script> 
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
    $(document).ready(function () {
        $("#btn").on("click", function() {
            $(this).hide();
            $("#wait").show()
            doWork();
        });
    });
        
    function doWork() {
        setTimeout('$("#wait").hide()', 5000);
        setTimeout('$("#btn").show()', 5000);
    }
</script>
</html>