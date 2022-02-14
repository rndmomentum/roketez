@extends('layouts.app')

@section('title')
    Search Course
@endsection

@section('css')
    <style>
        .bg-card-black{
            background-color: #000000;
        }
    </style>
@endsection

@section('content')
<form action="{{ url('explore/course') }}" method="GET">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg" name="c" placeholder="Find your favourite courses" required>
                <div class="input-group-append">
                <button class="btn btn-danger" type="submit">Search Course</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- List Courses -->
<div class="row mt-5"> 
    <div class="col-md-12">
        <h6 class="text-light">Find Your Courses : </h6>
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
            <div class="col-md-3 mb-4">
                <a href="{{ url('course') }}/{{ $course->course_id }}" class="text-decoration-none text-dark">
                    <div class="card shadow rounded border-0">
                        <img src="{{ asset('image/courses') }}/{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body bg-card-black">
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