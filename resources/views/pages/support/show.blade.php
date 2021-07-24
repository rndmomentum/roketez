@extends('layouts.app')

@section('title')
    Support #{{ $ticket_support->ticket_support_id }}
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
                @foreach($ticket_support_reply as $ticket)
                    <hr class="mb-3">
                    <p>{{ $ticket->sender_answer }}</p>
                    <p class="mb-4">From <b>{{ $ticket->sender_name }}</b></p>
                @endforeach

                <form action="{{ url('ticket-support/reply') }}/{{ $ticket_support->ticket_support_id }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">Reply : </label>
                        <textarea class="form-control" rows="3" name="sender" placeholder="Reply Here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Reply</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    
@endsection
