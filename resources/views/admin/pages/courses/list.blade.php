@extends('admin.layouts.app')

@section('title')
    List Courses
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Courses</h1>
</div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action="{{ url('admin/course/search') }}" method="get" class="needs-validation" novalidate>
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" placeholder="Search Course" required>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Search <span data-feather="search"></span></button>
        </div>
    </div>
</form>

<div class="row float-right mt-4">
    <div class="col-md-12">
        {{ $courses->links() }}
    </div>
</div>

@if(isset($details))
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Course ID</th>
        <th>Title</th>
        <th>Level</th>
        <th>Locked</th>
        <th>Created At</th>
        <th><span data-feather="settings"></span></th>
      </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>  
            <td>{{ $count++ }}</td>
            <td>{{ $course->course_id }}</td>
            <td>{{ $course->title }}</td>
            <td>
                @if($course->level == 'basic')
                    <span class="badge badge-info">
                        Basic
                    </span>
                @else 
                    <span class="badge badge-dark">
                        Advanced
                    </span>
                @endif
            </td>
            <td>
                @if($course->locked == 'yes')
                    <span class="badge badge-danger">
                        Yes
                    </span>
                @else 
                    <span class="badge badge-success">
                        No
                    </span>
                @endif
            </td>
            <td>{{ $course->created_at }}</td>
            <td>
                <a href="{{ url('admin/courses/edit') }}/{{ $course->course_id }}" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $course->course_id }}"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        <!-- Delete User -->
        <div class="modal fade" id="delete{{ $course->course_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Delete Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete?</p>

                        <b>Information You Will Remove :</b>
    
                        <ul>
                          <li>Course</li>
                          <li>User Payment History</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ url('admin/course/delete') }}/{{ $course->course_id }}" class="text-decoration-none btn btn-danger">Delete</a>  
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endif

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Course ID</th>
        <th>Title</th>
        <th>Level</th>
        <th>Locked</th>
        <th>Created At</th>
        <th><span data-feather="settings"></span></th>
      </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>  
            <td>{{ $count++ }}</td>
            <td>{{ $course->course_id }}</td>
            <td>{{ $course->title }}</td>
            <td>
                @if($course->level == 'basic')
                    <span class="badge badge-info">
                        Basic
                    </span>
                @else 
                    <span class="badge badge-dark">
                        Advanced
                    </span>
                @endif
            </td>
            <td>
                @if($course->locked == 'yes')
                    <span class="badge badge-danger">
                        Yes
                    </span>
                @else 
                    <span class="badge badge-success">
                        No
                    </span>
                @endif
            </td>
            <td>{{ $course->created_at }}</td>
            <td>
                <a href="{{ url('admin/courses/edit') }}/{{ $course->course_id }}" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $course->course_id }}"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        <!-- Delete User -->
        <div class="modal fade" id="delete{{ $course->course_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Delete Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete?</p>

                        <b>Information You Will Remove :</b>
    
                        <ul>
                          <li>Course</li>
                          <li>User Payment History</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ url('admin/course/delete') }}/{{ $course->course_id }}" class="text-decoration-none btn btn-danger">Delete</a>  
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
    
@endsection