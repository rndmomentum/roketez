@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('content')
<div class="row mt-5 mb-3">
    <div class="col-md-12">
        <h2 class="text-light">Categories</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <a href="#" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body text-center">
                    <h1><i class="fas fa-bullhorn"></i></h1>
                    <h3 class="mt-2">Marketing</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="#" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body text-center">
                    <h1><i class="fas fa-dollar-sign"></i></h1>
                    <h3 class="mt-2">Sales</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="#" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body text-center">
                    <h1><i class="fas fa-grin-hearts"></i></h1>
                    <h3 class="mt-2">Motivation</h3>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <a href="#" class="text-decoration-none text-dark">
            <div class="card">
                <div class="card-body text-center">
                    <h1><i class="fas fa-feather-alt"></i></h1>
                    <h3 class="mt-2">Copywriting</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h1><i class="fas fa-palette"></i></h1>
                <h3 class="mt-2">Branding</h3>
            </div>
        </div>
    </div>
</div>
@endsection