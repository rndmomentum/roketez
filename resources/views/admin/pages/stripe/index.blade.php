@extends('admin.layouts.app')

@section('title')
    Stripe API
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Stripe API KEY</h1>
</div>

<div class="row">
    @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
</div>

<form action="{{ url('admin/stripe-api/update') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Public Key</label>
                <input type="text" class="form-control" name="public_key" placeholder="Enter API Key" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Secret Key</label>
                <input type="text" class="form-control" name="secret_key" placeholder="Enter API Key" required>
            </div>
        </div>
        <div class="col-md-6">
            <button class="btn btn-dark">Update Api Key</button>
        </div>
    </div>
</form>
@endsection

@section('js')
    
@endsection