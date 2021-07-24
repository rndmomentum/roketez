@extends('admin.layouts.app')

@section('title')
    Users
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users Management</h1>
</div>

<div class="row">
    <!-- New Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/users/create') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">New Users</h5>
                Added new users manually and select membership.
                </div>
            </div>
        </a>
    </div>

    <!-- List Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/users/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users-cog fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">List Users</h5>
                Edit or update users details and check users memberships.
                </div>
            </div>
        </a>
    </div>

    <!-- Export Page -->
    <div class="col-md-4">
        <a href="{{ url('admin/user/export-data') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-file-export fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">Export Data</h5>
                Filter user and export with excel format
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection