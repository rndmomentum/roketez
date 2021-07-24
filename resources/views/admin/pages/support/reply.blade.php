@extends('admin.layouts.app')

@section('title')
    Support #{{ $ticket_support->ticket_support_id }}
@endsection

@section('css')
    
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Support #{{ $ticket_support->ticket_support_id }}</h1>
</div>

<div class="row mb-4">
    @foreach($ticket_support_reply as $ticket)
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body py-3 px-3">
                    <p>{{ $ticket->sender_answer }}</p>
                    <hr>
                    <p>From <b>{{ $ticket->sender_name }}</b></p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<form action="{{ url('admin/ticket-support/reply') }}/{{ $ticket_support->ticket_support_id }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="font-weight-bold">Reply : </label>
                <textarea class="form-control" rows="3" name="sender" placeholder="Reply Here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-dark">Reply</button>
        </div>
    </div>
</form>

@endsection


@section('js')
    
@endsection