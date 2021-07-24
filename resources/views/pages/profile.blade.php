@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('css')
    
@endsection

@section('content')
<div class="card">
    <div class="card-body py-4 px-4">
        
        @if(session('success'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        @endif

        {{-- Title Here --}}
        <div class="col-md-12 text-center">
            <h2>Public Profile</h2>
            <p>Update latest information</p>
        </div>
        <form action="{{ url('profile/update') }}/{{ $user->user_id }}" method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" placeholder="Your Firstname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" placeholder="Your Lastname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="Your Phone Number" required>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <button class="btn btn-danger rounded-pill float-right"><i class="fas fa-pencil-alt"></i> UPDATE PROFILE</button>
                </div>
            </div>
        </form>
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