<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choose Interest</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        label {
            width: 100%;
            font-size: 1rem;
        }

        .card-input-element+.card {
            height: calc(36px + 2*1rem);
            color: var(--danger);
            -webkit-box-shadow: none;
            box-shadow: none;
            border: 2px solid transparent;
            border-radius: 4px;
        }

        .card-input-element+.card:hover {
            cursor: pointer;
        }

        .card-input-element:checked+.card {
            border: 2px solid var(--danger);
            -webkit-transition: border .3s;
            -o-transition: border .3s;
            transition: border .3s;
        }

        @-webkit-keyframes fadeInCheckbox {
            from {
                opacity: 0;
                -webkit-transform: rotateZ(-20deg);
            }

            to {
                opacity: 1;
                -webkit-transform: rotateZ(0deg);
            }
        }

        @keyframes fadeInCheckbox {
            from {
                opacity: 0;
                transform: rotateZ(-20deg);
            }

            to {
                opacity: 1;
                transform: rotateZ(0deg);
            }
        }

    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body py-5 px-5">
                        <h4>Choose Your Interest</h4>
                        <hr class="mb-4">
                        <form action="{{ url('choose-interest/store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="marketing"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Marketing
                                        </div>
                                    </label>
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="sales"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Sales
                                        </div>
                                    </label>
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="branding"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Branding
                                        </div>
                                    </label>
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="operation"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Operation
                                        </div>
                                    </label>
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="hr"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Human Resources
                                        </div>
                                    </label>
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="webdevelopment"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Web Development
                                        </div>
                                    </label>
                                    <label class="mt-3">
                                        <input type="checkbox" name="interest[]" value="finance"
                                            class="card-input-element d-none">
                                        <div
                                            class="card card-body bg-light d-flex flex-row justify-content-between align-items-center">
                                            Finance
                                        </div>
                                    </label>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-danger float-right">Okay, Done <i
                                            class="fas fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-2">

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center footer-top pb-5">
        <small class="text-muted">All Right Reserved © {{ date('Y') }} Roketez</small>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5c12e9bac7.js" crossorigin="anonymous"></script>

</html>
