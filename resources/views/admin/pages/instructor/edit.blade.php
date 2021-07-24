@extends('admin.layouts.app')

@section('title')
    Edit Instructor
@endsection

@section('css')

@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Instructor</h1>
</div>

<form action="{{ url('admin/instructor/update') }}/{{ $admin->id }}"  method="POST" class="needs-validation" novalidate>
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

        <div class="col-md-6">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname" value="{{ $admin->firstname }}" placeholder="Enter Firstname" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="lastname" value="{{ $admin->lastname }}" placeholder="Enter Lastname" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ $admin->email }}" placeholder="Enter Email Address" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="password" value="{{ $admin->password }}" placeholder="Enter Password" required>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-dark">Update Instructor <span data-feather="arrow-right"></button>
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