@extends('layouts.app')

@section('title')
    Search Course
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<form action="{{ url('explore/course') }}" method="GET">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="find-courses"><b>Find</b> Courses</h1>
        </div>
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg" name="c" placeholder="Find your favourite courses" required>
                <div class="input-group-append">
                <button class="btn btn-outline-danger" type="submit">Search Course</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- List Courses -->

<div class="row mt-4"> 
    <div class="col-md-12">
        <h6>Find Your Courses : </h6>
        <hr>
    </div>
    @if(session('error'))
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <strong>Sorry!</strong> {{ session('error') }}
            </div>
        </div>
    @endif
    @if(isset($details))
        @foreach($details as $course)
            <div class="col-md-3 mt-4">
                <a href="{{ url('course') }}/{{ $course->course_id }}" class="text-decoration-none text-dark">
                    <div class="card rounded shadow">
                        <img src="{{ asset('image/courses') }}/{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body">
                            <p class="card-title d-inline-block" style="max-width: 350px;">{{ $course->title }}</p>
                            <p class="card-text font-weight-light">Najib Asaddok</p>
                            
                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star"></i> <span>(38, 400)</span>

                            <p><span class="font-weight-bold font-sales-price">RM {{ number_format($course->sales_price - ($course->sales_price * 10/100), 2) }}</span> <span class="font-weight-light font-original-price line-through">RM {{ $course->original_price }}</span> <span class="font-weight-light font-original-price">{{ $membership->course_discount }}% off</span></p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @endif
</div>
<!-- List Courses -->
@endsection

@section('js')
    
@endsection