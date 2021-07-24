@extends('admin.layouts.app')

@section('title')
    Edit #{{ $course->course_id }}
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Course #{{ $course->course_id }}</h1>
</div>

<form action="{{ url('admin/courses/update') }}/{{ $course->course_id }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
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

        <!-- Alert -->
        @if(session('error'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif


        <div class="col-md-12">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{ $course->title }}" placeholder="Enter Title" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Enter Description" required>{{ $course->description }}</textarea>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Settings
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Category</label>
                                <input type="text" class="form-control" placeholder="Categories" value="{{ $course->category }}" name="category" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Creator ID</label>
                                <input type="text" class="form-control" placeholder="Creator ID" value="{{ $course->creator_id }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Course Level</label>
                                <select class="form-control" name="level" required>
                                    @if($course->level == 'basic')
                                        <option value="basic">Basic</option>
                                        <option value="advanced">Advanced</option>
                                    @endif
                                    @if($course->level == 'advanced')
                                        <option value="advanced">Advanced</option>
                                        <option value="basic">Basic</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Locked Course</label>
                                @if($course->locked == 'yes')
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="locked" id="yes" value="yes" checked>
                                        <label class="form-check-label" for="yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="locked" id="no" value="no">
                                        <label class="form-check-label" for="no">
                                            No
                                        </label>
                                    </div>
                                @else 
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="locked" id="yes" value="yes">
                                        <label class="form-check-label" for="yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="locked" id="no" value="no" checked>
                                        <label class="form-check-label" for="no">
                                            No
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control-file">
                                <small class="text-muted">Size image is 1920 X 1080</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <button type="submit" class="btn btn-dark">Update Course <span data-feather="arrow-right"></span></button>
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