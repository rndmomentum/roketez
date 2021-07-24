@extends('layouts.app')

@section('title')
    My Courses
@endsection

@section('css')
    
@endsection

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container-fluid px-4">
        <h1 class="display-4">My Courses</h1>
        <p class="lead">
          Here is a list of courses you have purchased from Roketez
        </p>
    </div>
</div>

<div class="row mt-4">
    @foreach($courses as $course)
        @foreach($order_items as $order_item)
            @if($course->course_id == $order_item->course_id)
                <div class="col-md-3">
                    <a href="{{ url('course') }}/{{ $course->course_id }}" class="text-decoration-none text-dark">
                        <div class="card shadow">
                            <img src="{{ asset('image/courses') }}/{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                            <div class="card-body">
                                <h5 class="card-title d-inline-block">{{ $course->title }}</h5>
                                <p class="card-text font-weight-light">Najib Asaddok</p>

                                <div class="progress mt-3">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    @endforeach
</div>
@endsection

@section('title')
    
@endsection