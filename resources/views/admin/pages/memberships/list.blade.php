@extends('admin.layouts.app')

@section('title')
    List Memberships
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Memberships</h1>
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
        <th>Membership ID</th>
        <th>Title</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($memberships as $membership)
        <tr>  
            <td>{{ $count++ }}</td>
            <td>{{ $membership->membership_id }}</td>
            <td>{{ $membership->title }}</td>
            <td>
                @if ($membership->status == 'active')
                    <span class="badge badge-success">Active</span>
                @endif
                @if ($membership->status == 'deactive')
                    <span class="badge badge-secondary">Deactive</span>
                @endif
            </td>
            <td>
                <a href="{{ url('admin/memberships/edit') }}/{{ $membership->membership_id }}" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $membership->membership_id  }}"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>
        <!-- Delete Membership -->
        <div class="modal fade" id="delete{{ $membership->membership_id  }}" tabindex="-1" aria-hidden="true">
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
                      <li>Membership</li>
                      <li>Users</li>
                      <li>Subscription</li>
                    </ul>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="{{ url('admin/membership/delete') }}/{{ $membership->membership_id  }}" class="btn btn-danger">Delete</a>
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