@extends('admin.layouts.app')

@section('title')
    Lessons
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lessons Management</h1>
</div>

<div class="row">
    <!-- New Lesson -->
    <div class="col-md-4">
        <a href="{{ url('admin/lessons/create') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fab fa-leanpub fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">New Lessons</h5>
                Added new lesson and pick any course that related with lesson.
                </div>
            </div>
        </a>
    </div>

    <!-- List Lesson -->
    <div class="col-md-4">
        <a href="{{ url('admin/lessons/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-list fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">List Lessons</h5>
                Edit, update or view lessson or change lesson to other course.
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection