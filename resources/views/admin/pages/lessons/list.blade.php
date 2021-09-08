@extends('admin.layouts.app')

@section('title')
    List Lessons
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Lessons</h1>
</div>

<form action="{{ url('admin/lesson/search') }}" method="GET" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search Lesson" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Search <span data-feather="search"></span></button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Created At</th>
                <th><span data-feather="settings"></span></th>
              </tr>
            </thead>
            <tbody>
                @foreach($lessons as $lesson)
                    @foreach($courses as $course)
                        @if($course->course_id == $lesson->course_id)
                            <tr>  
                                <td>{{ $count++ }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->created_at }}</td>
                                <td>
                                    <a href="{{ url('admin/lessons/edit') }}/{{ $lesson->lesson_id  }}" target="_blank" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $lesson->lesson_id }}"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <!-- Delete User -->
                            <div class="modal fade" id="delete{{ $lesson->lesson_id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Delete Lesson</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete?</p>
        
                                            <b>Information You Will Remove :</b>
                        
                                            <ul>
                                            <li>Lesson</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ url('admin/lesson/delete') }}/{{ $lesson->lesson_id }}" class="text-decoration-none btn btn-danger">Delete</a>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row float-right mt-2">
    <div class="col-md-12">
        {{ $lessons->links() }}
    </div>
</div>
@endsection

@section('js')
    
@endsection