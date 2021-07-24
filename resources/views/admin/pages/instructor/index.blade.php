@extends('admin.layouts.app')

@section('title')
    Instructor
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Instructor Management</h1>
</div>

<div class="row">
    <!-- New Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/instructor/create') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">New Instructor</h5>
                Added new instructor manually and select membership.
                </div>
            </div>
        </a>
    </div>

    <!-- List Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/instructor/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users-cog fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">List Instructor</h5>
                Edit or update instructor details.
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection