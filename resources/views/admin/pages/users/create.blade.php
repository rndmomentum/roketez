@extends('admin.layouts.app')

@section('title')
    New User
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">New User</h1>
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
        <form action="{{ url('admin/user/store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required>
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" placeholder="Enter Phone Number" required>
                    </div>
                    <button type="submit" class="btn btn-dark float-right mt-3">Update User <span data-feather="arrow-right"></span></button>
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