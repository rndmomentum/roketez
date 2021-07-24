@extends('admin.layouts.app')

@section('title')
    Subscriber
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Subscriber</h1>
</div>

<form action="#" method="get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Lesson" required>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search <span data-feather="search"></span></button>
        </div>
    </div>
</form>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Subscriber ID</th>
        <th>User ID</th>
        <th>Stripe ID</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Status</th>
        <th><span data-feather="settings"></span></th>
      </tr>
    </thead>
    <tbody>
        @foreach($subscriptions as $subscription)
        <tr>  
            <td>{{ $count++ }}</td>
            <td>{{ $subscription->subscription_id }}</td>
            <td>{{ $subscription->user_id }}</td>
            <td>{{ $subscription->stripe_id }}</td>
            <td>{{ $subscription->quantity }}</td>
            <td>{{ $subscription->price }}</td>
            <td>{{ $subscription->status }}</td>
            <td>
                <a href="#" class="text-decoration-none"><button class="btn btn-sm btn-danger"><span data-feather="trash-2"></span></button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
    
@endsection