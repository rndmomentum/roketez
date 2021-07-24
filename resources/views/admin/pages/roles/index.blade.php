@extends('admin.layouts.app')

@section('title')
    Admin Roles
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin Roles</h1>
</div>

<div class="row">
    <!-- New Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/role/create') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">New Role</h5>
                Role new administrator or moderator.
                </div>
            </div>
        </a>
    </div>

    <!-- List Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/role/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users-cog fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">List Roles</h5>
                Edit or update roles details.
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection