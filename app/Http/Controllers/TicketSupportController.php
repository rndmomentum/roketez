<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketSupport;
use App\TicketSupportReply;
use App\Mail\SupportRoketez;

use Mail;
use Auth;

class TicketSupportController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::User();
        $ticket_id = uniqid();

        TicketSupport::create([

            'ticket_support_id' => $ticket_id,
            'subject' => $request->subject,
            'level' => $request->level,
            'status' => 'open',
            'user_id' => $user->user_id

        ]);

        TicketSupportReply::create([

            'ticket_support_id' => $ticket_id,
            'sender_answer' => $request->sender,
            'sender_name' => $user->firstname . ' ' . $user->lastname,

        ]);

        Mail::to('admin@roketez.com')->send(new SupportRoketez());


        return redirect()->back()->with('success', 'Ticket has been sent to support, please wait during the working period.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $ticket_support = TicketSupport::where('ticket_support_id', $id)->first();
        $ticket_support_reply = TicketSupportReply::where('ticket_support_id', $id)->get();

        return view('pages.support.show', compact('ticket_support_reply', 'ticket_support'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::User();

        $ticket_support = TicketSupport::where('ticket_support_id', $id)->first();
        $ticket_support->status = 'open';

        TicketSupportReply::create([

            'ticket_support_id' => $id,
            'sender_answer' => $request->sender,
            'sender_name' => $user->firstname . ' ' . $user->lastname,

        ]);

        $ticket_support->save();

        Mail::to('admin@roketez.com')->send(new SupportRoketez());

        return redirect('ticket-support')->with('success', 'Ticket has been sent to support, please wait during the working period.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
