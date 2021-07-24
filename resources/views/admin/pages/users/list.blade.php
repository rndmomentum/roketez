@extends('admin.layouts.app')

@section('title')
    List Users
@endsection

@section('css')
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">List Users</h1>
        </div>
    </div>
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successful!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    <div class="col-md-12">
        <form action="{{ url('admin/user/search') }}" method="GET" class="needs-validation" novalidate>
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search Users" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Search <span data-feather="search"></span></button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <div class="dropdown">
            <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Filter Status
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ url('admin/user/list') }}">All</a>
                <a class="dropdown-item" href="{{ url('admin/user/list') }}/active">Active</a>
                <a class="dropdown-item" href="{{ url('admin/user/list') }}/pending">Pending</a>
                <a class="dropdown-item" href="{{ url('admin/user/list') }}/incomplete">Incomplete</a>
                <a class="dropdown-item" href="{{ url('admin/user/list') }}/incomplete_expired">Incomplete Expired</a>
                <a class="dropdown-item" href="{{ url('admin/user/list') }}/past_due">Past Due</a>
                <a class="dropdown-item" href="{{ url('admin/user/list') }}/canceled">Canceled</a>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-2">
        @if(isset($details))
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th><span data-feather="settings"></span></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>  
                        <td>{{ $count++ }}</td>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->status == 'active')
                                <span class="badge badge-success">Active</span>
                            @endif

                            @if($user->status == 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @endif
                            
                            @if($user->status == 'incomplete')
                                <span class="badge badge-dark">Incomplete</span>
                            @endif

                            @if($user->status == 'past_due')
                                <span class="badge badge-danger">Past Due</span>
                            @endif

                            @if($user->status == 'canceled')
                                <span class="badge badge-dark">Canceled</span>
                            @endif

                            @if($user->status == 'incomplete_expired')
                                <span class="badge badge-danger">Incomplete Expired</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/user/edit') }}/{{ $user->user_id }}" target="_blank" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $user->user_id }}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <!-- Delete User -->
                    <div class="modal fade" id="delete{{ $user->user_id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">Delete User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete?</p>

                                    <b>Information You Will Remove :</b>
                
                                    <ul>
                                    <li>Subscription</li>
                                    <li>Payment History</li>
                                    <li>User Details</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ url('admin/user/delete') }}/{{ $user->user_id }}" class="text-decoration-none btn btn-danger">Delete</a>  
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
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th><span data-feather="settings"></span></th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>  
                    <td>{{ $count++ }}</td>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->status == 'active')
                            <span class="badge badge-success">Active</span>
                        @endif

                        @if($user->status == 'pending')
                            <span class="badge badge-warning">Pending</span>
                        @endif
                        
                        @if($user->status == 'incomplete')
                            <span class="badge badge-dark">Incomplete</span>
                        @endif

                        @if($user->status == 'past_due')
                            <span class="badge badge-danger">Past Due</span>
                        @endif

                        @if($user->status == 'canceled')
                            <span class="badge badge-dark">Canceled</span>
                        @endif

                        @if($user->status == 'incomplete_expired')
                            <span class="badge badge-danger">Incomplete Expired</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/user/edit') }}/{{ $user->user_id }}" target="_blank" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $user->user_id }}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                <!-- Delete User -->
                <div class="modal fade" id="delete{{ $user->user_id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete?</p>

                                <b>Information You Will Remove :</b>
            
                                <ul>
                                <li>Subscription</li>
                                <li>Payment History</li>
                                <li>User Details</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a href="{{ url('admin/user/delete') }}/{{ $user->user_id }}" class="text-decoration-none btn btn-danger">Delete</a>  
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-12 mt-3">
        <span class="float-right">
            {{ $users->links() }}
        </span>
    </div>
</div>
@endsection

@section('js')
    
@endsection