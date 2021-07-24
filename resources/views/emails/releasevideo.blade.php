<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .mt-p{
            margin-top: 20px;
            font-size: 20px;
        }
        .mt-t{
            margin-top: 20px;
        }
        .mt-btn{
            margin-top: 40px;
        }
        .mt-img{
            margin-top: 20px;
        }
        .btn-red{
            background-color: #fa1e0e;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 65px;
            padding-right: 65px;
            color: white;
            border-style: none;
            border-radius: 40px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .img-center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }
        .content-center{
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }
        .bg-black{
            background-color: black;
            color: white;
            padding-top: 100px;
            padding-bottom: 100px;
        }
    </style>
</head>
<body>
    <div class="bg-black">
        <img class="img-center mt-img" src="https://roketez.com/image/courses/arb-februari.jpg">
        <h1 class="mt-t content-center">Return On Investment Kepada Bisnes</h1>
        <p class="tmt-p content-center">
            Bahaya kalau sales jutaan ringgit setahun tapi bila tanya berapa saving terus geleng kepala. Ini sebab Return On Investment (ROI) penting dalam bisnes.
        </p>
        {{-- <img class="img-center mt-img" src="{{ asset('image/courses') }}/arb-februari.jpg">
        <h1 class="mt-t content-center">{{ $title }}</h1>
        <p class="tmt-p content-center">
            {{ $description }}
        </p> --}}
        <button class="btn-red mt-btn">Watch Now</button>
    </div>
</body>
</html>