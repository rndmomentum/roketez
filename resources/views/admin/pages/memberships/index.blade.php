@extends('admin.layouts.app')

@section('title')
    Memberships
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Memberships Management</h1>
</div>

<div class="row">
    <!-- New Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/memberships/create') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">New Memberships</h5>
                Added new memberships and lock memberships if complete 3 memberships.
                </div>
            </div>
        </a>
    </div>

    <!-- List Course -->
    <div class="col-md-4">
        <a href="{{ url('admin/memberships/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-users-cog fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">List Memberships</h5>
                Edit or update memberships details and see subscriber from any memberships.
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection