@extends('admin.layouts.app')

@section('title')
    Ticket Support
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ticket Support</h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th>#</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($ticket_support as $ticket)
            <tr>  
                <td>{{ $count++ }}</td>
                <td>{{ $ticket->subject }}</td>
                <td>
                    @if($ticket->status == 'open')
                        <span class="text-danger">Open</span>
                    @endif

                    @if($ticket->status == 'solved')
                        <span class="text-success">Solved</span>
                    @endif

                    @if($ticket->status == 'waiting')
                        <span class="text-warning">Awaiting Reply</span>
                    @endif
                </td>
                <td>2021-04-22</td>
                <td>
                    <a href="{{ url('admin/ticket-support') }}/{{ $ticket->ticket_support_id }}" class="text-decoration-none btn btn-sm btn-light"><i class="fas fa-pencil-alt"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
    
@endsection