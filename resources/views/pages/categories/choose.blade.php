@extends('layouts.app')

@section('title')
    {{ $category }}
@endsection

@section('css')
<style>
    .bg-card-black{
        background-color: #000000;
    }
</style>
@endsection

@section('content')
{{-- Sales --}}
<div class="row mt-3"> 
    <div class="col-md-12 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-danger text-decoration-none" href="{{ url('categories') }}">Categories</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category }}</li>
            </ol>
        </nav>
    </div>
    @foreach($courses as $course)
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
</div>
@endsection

@section('js')
    
@endsection