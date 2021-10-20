@extends('admin.layouts.app')

@section('title')
    Edit #{{ $membership->membership_id }}
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit #{{ $membership->membership_id }}</h1>
</div>

<form action="{{ url('admin/memberships/update') }}/{{ $membership->membership_id }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">

        <!-- Alert -->
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

        <div class="col-md-12">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ $membership->title }}" placeholder="Enter Title" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter Description" required>{{ $membership->description }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light">
                  Pricing
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Original Price</label>
                                <input type="text" class="form-control" name="original_price" value="{{ $membership->original_price }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sales Price</label>
                                <input type="text" class="form-control" name="sales_price" value="{{ $membership->sales_price }}" pattern="^\d*(\.\d{0,2})?$" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Membership Terms
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="active" @if($membership->status == 'active') checked @else @endif>
                                    <label class="form-check-label" for="active">
                                      Active
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="deactive" value="deactive" @if($membership->status == 'deactive') checked @else @endif>
                                    <label class="form-check-label" for="deactive">
                                        Deactive
                                    </label>
                                </div>
                                @if($membership->status == 'deactive')
                                    <small class="text-danger">*Important to deactive others membership before select active this membership</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trial Day</label>
                                <input type="text" value="{{ $membership->trial_day }}" name="trial_day" placeholder="Enter Trial Day" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <button type="submit" class="btn btn-dark">Update Membership <span data-feather="arrow-right"></span></button>
        </div>
    </div>
</form>
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