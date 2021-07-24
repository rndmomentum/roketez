@extends('admin.layouts.app')

@section('title')
    Subscriptions
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Subscriptions Management</h1>
</div>

<div class="row">
    <!-- New Lesson -->
    <div class="col-md-4">
        <a href="{{ url('admin/subscriptions/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-rss fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">Subscriber</h5>
                List of user subscribe as membership in E-Learning.
                </div>
            </div>
        </a>
    </div>

    <!-- List Lesson -->
    <div class="col-md-4">
        <a href="{{ url('admin/lessons/list') }}" class="text-decoration-none text-dark">
            <div class="media">
                <i class="fas fa-chart-area fa-5x"></i>
                <div class="ml-3 media-body">
                <h5 class="mt-0">Sales Report</h5>
                Monthly, Weekly and Daily report user subscribe or register in E-Learning.
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

@section('js')
    
@endsection