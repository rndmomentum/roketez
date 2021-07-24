@extends('admin.layouts.app')

@section('title')
    Courses
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Courses Management</h1>
</div>

<div class="row">
    <!-- New Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/courses/create') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-book fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">New Course</h5>
                Added new course with original price and sales price of course.
                </div>
            </div>
        </a>
    </div>

    <!-- List Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/courses/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-list fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">List Course</h5>
                Edit, update or view course will be here for future update.
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection