@extends('admin.layouts.app')

@section('title')
    Export Data
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Export Data</h1>
</div>   

<form action="{{ url('admin/user/export-data/export') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>From</label>
                <input type="text" class="form-control" placeholder="exp. 2021-04-01" name="from" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>To</label>
                <input type="text" class="form-control" placeholder="exp. 2021-04-27" name="to" required>
            </div>
        </div>

        <div class="col-md-12">
            <label class="font-weight-bold">User Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="active" value="active">
                <label class="form-check-label" for="active">
                Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="pending" value="pending">
                <label class="form-check-label" for="pending">
                Pending
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="past_due" value="past_due">
                <label class="form-check-label" for="past_due">
                Past Due
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="incomplete" value="incomplete">
                <label class="form-check-label" for="incomplete">
                Incomplete
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="canceled" value="canceled">
                <label class="form-check-label" for="canceled">
                Canceled
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="unpaid" value="unpaid">
                <label class="form-check-label" for="unpaid">
                Unpaid
                </label>
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-dark float-right">Export</button>
        </div>
    </div>
</form>
@endsection

@section('js')
    
@endsection