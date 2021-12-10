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

<div class="row mt-4">
    <!-- New User -->
    <div class="col-md-4">
        <a href="{{ url('admin/user/create') }}" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="fas fa-users fa-5x"></i>
                        <div class="ml-3 media-body">
                        <h5 class="mt-0">New User</h5>
                        Added new user manually and select membership.
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- List Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/user/list') }}" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="fas fa-users-cog fa-5x"></i>
                        <div class="ml-3 media-body">
                        <h5 class="mt-0">List Users</h5>
                        Edit or update users details and check users memberships.
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Export Page -->
    <div class="col-md-4">
        <a href="{{ url('admin/user/export-data') }}" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="fas fa-file-export fa-5x"></i>
                        <div class="ml-3 media-body">
                        <h5 class="mt-0">Export Data</h5>
                        Filter user and export with excel format
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row mt-5">
    <!-- Date Filter -->
    <div class="col-md-4">
        <a href="{{ url('admin/user/date-filter') }}" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <i class="fas fa-calendar-alt fa-5x"></i>
                        <div class="ml-3 media-body">
                        <h5 class="mt-0">Date Filter</h5>
                            Get list user from date registered
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection