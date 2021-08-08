@extends('layouts.app')

@section('title')
    Subscription History
@endsection

@section('css')
    
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('success'))
            <div class="col-md-12 py-4 px-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        <!-- Subscription Detail -->
        <div class="col-md-12">
            <h4>Subscription Detail</h4>
            <hr>
            <table class="table mt-2">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>Membership Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Renew At</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Plan {{ $get_membership_name->title }}</td>
                        <td>
                            @if($user->status == 'active')
                                <span class="badge badge-success">Active</span>
                            @endif

                            @if($user->status == 'trialing')
                                <span class="badge badge-info">Trial</span>
                            @endif
                        </td>
                        <td>RM {{ $subscription->price }}</td>
                        <td>{{ date('d-m-Y', $get_status_subscription->current_period_end) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if($get_status_subscription->status == 'canceled')

        @else
            <div class="col-md-12 mt-4">
                <button class="btn btn-danger rounded-pill" data-toggle="modal" data-target="#cancelsubscription{{ $subscription->order_id }}">Cancel Subscription</button>
            </div>
        @endif

        <!-- Payment History -->
        <div class="col-md-12 mt-5">
            <h4>Membership Purchase History</h4>
            <hr>
            <table class="table mt-2">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>Order ID</th>
                        <th>Membership Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payment_history as $payment)
                        @foreach($memberships as $get_membership)
                            @if($get_membership->membership_id == $payment->membership_id)
                                <tr>
                                    <td>{{ $payment->order_id }}</td>
                                    <td>{{ $get_membership->title }}</td>
                                    <td>RM {{ $payment->price }}</td>
                                    <td>
                                        @if($)
                                            <span class="badge badge-success">Success</span>
                                        @endif
                                    </td>
                                    <td>{{ $payment->created_at }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cancel Subscription -->
        <div class="modal fade" id="cancelsubscription{{ $subscription->order_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Cancel Subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <p> Do You Agree to Cancel Your Monthly Subscription?</p> <br>

                    <p><b>You are informed below :</b></p>
                    <ul>
                        <li>The re-subscription will be made after your subscription expires.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ url('cancel/subscription') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">I'm Agree</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection