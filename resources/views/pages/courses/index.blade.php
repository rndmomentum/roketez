@extends('layouts.app')

@section('title')
    {{ $course->title }}
@endsection

@section('css')
<style>
    ul.timeline {
        list-style-type: none;
        
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #d4d9df;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Course Image and Price -->
<div class="row">
    
        <div class="col-md-7">
            <img src="{{ asset('image/courses') }}/{{ $course->image }}" width="100%" alt="{{ $course->title }}">
        </div>
        <div class="col-md-5">
            <h3 class="text-light">{{ $course->title }}</h3>
            <p class="text-light">{{ $course->description }}</p> <br>
            <p class="text-light">Created By <b>Team Momentum</b></p>
            <a href="{{ url('lesson') }}/{{ $get_first_lesson->lesson_id }}" class="btn btn-danger rounded-pill">Enroll Now <i class="fas fa-arrow-right"></i></a>
        </div>

</div>


<div class="row mt-4">
    <div class="col-md-12">
        <h2 class="text-light">Course Content</h2>
        <hr class="border border-white">
    </div>
</div>
<!-- List Lessons -->
<div class="row">
    <div class="col-md-6">
        <ul class="timeline">
            @foreach($lessons as $lesson)
                <li>
                    <p class="text-light">{{ $lesson->title }}</p>
                    {{-- <p class="text-dark">
                        {{ $lesson->description }}
                    </p> --}}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('js')

@endsection