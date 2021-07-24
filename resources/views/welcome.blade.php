<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roketez</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Style -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        .background-section{
            background-color: black;
        }
    </style>
</head>
<body>

<div class="bg-img atas">
    <div class="left">
        <img src="{{ asset('image/roket-ez-logo-baru-3.png') }}" class="size-besar" width="10%">
    </div>

    <div class="right">
        <a href="{{ route('login') }}" class="btn btn-danger btn-md">Sign In</a>
    </div>

    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h1 class="size-title">Jom Roketkan Sales <br> Anda 10X Ganda</h1>
    
                <h4 class="font-weight-normal">
                    Learn anytime in any places.
                </h4>

                <p class="font-weight-light" style="margin-top: 70px;">Anda dah bersedia nak roketkan sales? Sila isikan emel untuk mendaftar.</p>
            </div>
        </div>
        <form action="{{ url('user-register') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group input-group-lg mb-3">
                        <input type="email" class="form-control" placeholder="Email Address" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger" type="button">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row m-0" style="background-color: rgb(34, 34, 34)">
    <span style="height: 5px"></span>
</div>

<section class="showcase background-section">
    <div class="container-fluid text-white p-0">

        {{-- Section 1 --}}
        <div class="row px-5 py-5 no-gutters m-0">
            <div class="col-lg-6 order-lg-2 showcase-img text-center ">
                <img src="{{ asset('image/section/kunci-3.png') }}" class="img-fluid" width="70%">
            </div>
            <div class="col-lg-6 my-auto order-lg-1 showcase-text px-5">
                <h2>Kunci Pemasaran Online</h2>
                <p class="lead mb-0">
                    Kuasai kunci pemasaran online yang boleh bantu anda tukar prospek kepada pelanggan setia.
                </p>
            </div>
        </div>
        <div class="row m-0" style="background-color: rgb(34, 34, 34)">
            <span style="height: 5px"></span>
        </div>

        {{-- Section 2 --}}
        <div class="row px-5 py-5  no-gutters m-0">
            <div class="col-lg-6 showcase-img text-center">
                <img src="{{ asset('image/section/kenali-3.png') }}" class="img-fluid" width="35%">
            </div>
            <div class="col-lg-6 my-auto order-lg-1 showcase-text px-5">
                <h2>Kenali Bakal Pelanggan</h2>
                <p class="lead mb-0">
                    Ramai usahawan tidak kenal siapakah pelanggan ideal yang mereka inginkan menyebabkan mereka sukar untuk buat jualan
                </p>
            </div>
        </div>
        <div class="row m-0" style="background-color: rgb(34, 34, 34)">
            <span style="height: 5px"></span>
        </div>

        {{-- Section 3 --}}
        <div class="row px-5 py-5  no-gutters m-0">
            <div class="col-lg-6 order-lg-2 showcase-img text-center">
                <img src="{{ asset('image/section/facebook.png') }}" class="img-fluid" width="80%">
            </div>
            <div class="col-lg-6 my-auto order-lg-1 showcase-text px-5">
                <h2>Teknik Facebook Marketing</h2>
                <p class="lead mb-0">
                    Mahirkan diri dalam teknik Facebook Marketing yang mudah dan berkesan menarik ramai pelanggan
                </p>
            </div>
        </div>
        <div class="row m-0" style="background-color: rgb(34, 34, 34)">
            <span style="height: 5px"></span>
        </div>

        {{-- Section 4 --}}
        <div class="row px-5 py-5  no-gutters m-0">
            <div class="col-lg-6 showcase-img text-center">
                <img src="{{ asset('image/section/content.png') }}" class="img-fluid" width="80%">
            </div>
            <div class="col-lg-6 my-auto order-lg-1 showcase-text px-5">
                <h2>Hasilkan Konten Berkualiti</h2>
                <p class="lead mb-0">
                    Tidak tahu apa nak share dalam posting Facebook? Ini cabaran ramai usahawan perlu atasi jika nak berjaya
                </p>
            </div>
        </div>
        <div class="row m-0" style="background-color: rgb(34, 34, 34)">
            <span style="height: 5px"></span>
        </div>

        {{-- Section 5 --}}
        <div class="row px-5 py-5  no-gutters m-0">
            <div class="col-lg-6 order-lg-2 showcase-img text-center">
                <img src="{{ asset('image/section/strategi.png') }}" class="img-fluid" width="70%">
            </div>
            <div class="col-lg-6 my-auto order-lg-1 showcase-text px-5">
                <h2>Strategi Yang Terbukti Berkesan</h2>
                <p class="lead mb-0">
                    Tonton & hayati kisah kebangkitan usahawan yang telah dibantu untuk berikan anda inspirasi, semangat & keyakinan untuk berjaya
                </p>
            </div>
        </div>
        <div class="row m-0" style="background-color: rgb(34, 34, 34)">
            <span style="height: 5px"></span>
        </div>
    </div>
</section>

{{-- FAQ --}}
<div class="row pt-4 background-section">
    <div class="col-md-12 text-center pb-3 pt-4">
        <span class="text-muted" style="font-size: small;">All Right Reserved &copy; {{ date('Y') }} Roketez</span>
    </div>
</div>
    
</body>
<script src="https://kit.fontawesome.com/5c12e9bac7.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>