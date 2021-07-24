@extends('layouts.app')

@section('title')
    Explore
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .bg-card-black{
            background-color: #000000;
        }
    </style>
@endsection

@section('content')

@if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Search Courses -->
{{-- <form action="{{ url('explore/course') }}" method="GET">
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
</form> --}}

@if($courses->isEmpty())
    <div class="alert alert-info" role="alert">
        The course has not yet been uploaded and will be updated shortly, we will expedite the process as soon as possible.
    </div>
@else    
    <!-- Other Courses -->
    <div class="row mt-5"> 
        <div class="col-md-12 mb-2">
            <h5 class="text-light">All Courses</h5>
        </div>
        @foreach($courses as $course)
            <div class="col-md-3 mb-4">
                <a href="{{ url('course') }}/{{ $course->course_id }}" class="text-decoration-none text-dark">
                    <div class="card shadow rounded border-0">
                        <img src="{{ asset('image/courses') }}/{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body bg-card-black">
                            {{-- <h4 class="text-light d-inline-block font-weight-bold" style="max-width: 350px;">{{ $course->title }}</h4>
                            <p class="card-text font-weight-light" style="color: #CDCCCC">Team Momentum</p>
                            
                            @if($course->level == 'advanced')
                                <span class="badge badge-danger">Advanced</span>
                            @endif
                            @if($course->level == 'basic')
                                <span class="badge badge-primary">Basic</span>
                            @endif --}}
                            {{-- <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star"></i> <span>(38, 400)</span> --}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif

@endsection

@section('js')
    
@endsection
