@extends('layouts.app')

@section('title')
    Ticket Support
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        .overlay-dark {
            background: rgba(0, 0, 0, 0.8);
        }
        .bg-card-black{
            background-color: #222222;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-3">
        <h2 class="text-light text-center">Ticket Support</h2>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body py-5 px-5">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successful!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <button class="btn btn-dark float-right mb-3" data-toggle="modal" data-target="#createticket"><i class="fas fa-plus"></i> Create Ticket</button>

                <!-- Create Ticket -->
                <div class="modal fade" id="createticket" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Create Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{ url('ticket-support/post') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <select class="form-control" name="level">
                                        <option>-- Choose Level --</option>
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Title Here" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Request Here..." name="sender" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Submit Request</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Created At</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($ticket_support as $ticket)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td><a href="{{ url('ticket-support') }}/{{ $ticket->ticket_support_id }}" class="text-dark">{{ $ticket->subject }}</a></td>
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
                            <td>{{ $ticket->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    
@endsection
