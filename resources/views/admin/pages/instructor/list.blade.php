@extends('admin.layouts.app')

@section('title')
    List Instructor
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Instructor</h1>
</div>

<form action="#" method="get">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Membership" required>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search <span data-feather="search"></span></button>
        </div>
    </div>
</form>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Fullname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Created At</th>
        <th><span data-feather="settings"></span></th>
      </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>  
            <td>{{ $count++ }}</td>
            <td>{{ $admin->firstname }} {{ $admin->lastname }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->role }}</td>
            <td>{{ $admin->created_at }}</td>
            <td>
                <a href="{{ url('admin/instructor/edit') }}/{{ $admin->admin_id }}" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $admin->admin_id }}"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        <!-- Delete Membership -->
        <div class="modal fade" id="delete{{ $admin->admin_id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Delete Membership</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>

                    <b>Information You Will Remove :</b>

                    <ul>
                      <li>Instructor</li>
                    </ul>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ url('admin/instructor/delete') }}/{{ $admin->admin_id }}" class="btn btn-danger">Delete</a>
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