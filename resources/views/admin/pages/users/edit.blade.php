@extends('admin.layouts.app')

@section('title')
    Edit User #{{ $user->user_id }}
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User {{ $user->user_id }}</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <p class="float-left">Status : <b>{{ $user->status }}</b></p>
    </div>
</div>

<div class="row">
    @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ url('admin/user/update') }}/{{ $user->user_id }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" placeholder="Enter Firstname" required>
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" placeholder="Enter Lastname" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" value="{{ $user->phone_number }}" placeholder="Enter Phone Number" required>
                    </div>
                    <button type="submit" class="btn btn-dark float-right mt-3">Update User <span data-feather="arrow-right"></span></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
              Subscription Details
            </div>
            <div class="card-body">
                <p><b>Status : </b> @if($subscription_check->isEmpty()) <span class="text-muted">Missing</span>  @else {{ $subscription_stripe->status }} <span class="text-danger">*Data From Stripe</span> @endif</p>
                <p><b>ID : </b> @if($subscription_check->isEmpty()) <span class="text-muted">Missing</span> @else {{ $subscription->subscription_id }} <span class="text-danger">*Data From Stripe</span> @endif</p>
                <p><b>Expired At : </b> @if($subscription_check->isEmpty()) <span class="text-muted">Missing</span>  @else {{ date('d-m-Y', $subscription_stripe->current_period_end) }} <span class="text-danger">*Data From Stripe</span> @endif</p>
                @if($subscription_check->isEmpty()) @else <a href="https://dashboard.stripe.com/subscriptions/{{ $subscription->subscription_id }}" target="_blank" class="btn btn-primary btn-block">Go To Stripe <i class="fas fa-arrow-right"></i></a> @endif
                @if($subscription_check->isEmpty())  
                
                @else
                    @if($subscription_stripe->status == 'canceled')

                    @else
                        <button class="btn btn-danger btn-block mt-3" data-toggle="modal" data-target="#deletesubscription{{ $user->user_id }}"><i class="fas fa-times"></i> Delete</button>
                        <button class="btn btn-danger btn-block mt-3" data-toggle="modal" data-target="#cancel{{ $user->user_id }}"><i class="fas fa-times"></i> Cancel</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <h4>Payment History</h4>
        <hr>
    </div>
    <div class="col-md-12 mt-4">
        <form action="{{ url('admin/user/edit/generate-payment') }}/{{ $user->user_id }}" method="POST">
            @csrf
            <a class="btn btn-success float-right text-decoration-none text-light" data-toggle="modal" data-target="#generate">Generate Payment History</a>

            <!-- Generate Payment -->
            <div class="modal fade" id="generate" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Generate Payment History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <h6>If button was clicked, list below will be changed :</h6>
                    <ul>
                        <li>New payment history will be created.</li>
                        <li>Number of sales will be changed.</li>
                    </ul>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 mt-2">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                  <th>#</th>
                  <th>Order ID</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Created At</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($payment_history as $payment)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $payment->order_id }}</td>
                        <td>RM {{ $payment->price }}</td>
                        <td>
                            @if($payment->status == 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @endif

                            @if($payment->status == 'paid')
                                <span class="badge badge-success">Paid</span>
                            @endif

                            @if($payment->status == 'unpaid')
                                <span class="badge badge-danger">Unpaid</span>
                            @endif
                        </td>
                        <td>
                            {{ $payment->created_at }}
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#syncpaymentstatus{{ $payment->order_id }}"><i class="fas fa-sync"></i></button> 
                            <button class="btn btn-light btn-sm" data-toggle="modal" data-target="#editcreatedat{{ $payment->order_id }}"><i class="far fa-edit"></i></button> 
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removepayment{{ $payment->order_id }}"><i class="fas fa-trash-alt"></i></button> 
                        </td>
                    </tr>
                    <!-- Remove Payment -->
                    <div class="modal fade" id="removepayment{{ $payment->order_id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Remove Payment History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <ul>
                                <li>Will be deleted from payment history</li>
                                <li>Monthly Sales will be changed</li>
                            </ul>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ url('admin/payment-history') }}/{{ $payment->order_id }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Sync Payment Status -->
                    <div class="modal fade" id="syncpaymentstatus{{ $payment->order_id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Sync Payment Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <ul>
                                <li>Payment History status will be changed</li>
                                <li>Monthly Sales will be changed</li>
                            </ul>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ url('admin/sync-payment-history-status') }}/{{ $payment->user_id }}/{{ $payment->order_id }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Sync Now</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Edit Created At -->
                    <div class="modal fade" id="editcreatedat{{ $payment->order_id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Update Created At</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{ url('admin/update-created-at') }}/{{ $payment->order_id }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="created_at" value="{{ $payment->created_at }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Cancel Subscription -->
<div class="modal fade" id="cancel{{ $user->user_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Cancel Subscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <ul>
            <li>Account will be end after expired date.</li>
            <li>No longer subscription in Roketez.</li>
        </ul>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ url('admin/cancel-subscription') }}/{{ $user->user_id }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Unsubscribe</button>
            </form>
        </div>
    </div>
    </div>
</div>


<!-- Delete Subscription -->
<div class="modal fade" id="deletesubscription{{ $user->user_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Delete Subscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <ul>
            <li>No longer subscribe on this plan.</li>
            <li>User status will set to <b>PENDING</b></li>
        </ul>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ url('admin/delete-subscription') }}/{{ $user->user_id }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>
@endsection