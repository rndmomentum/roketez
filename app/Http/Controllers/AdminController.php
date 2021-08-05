<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Mail\UserRoketez;
use App\TicketSupport;
use App\TicketSupportReply;
use App\PaymentHistory;
use App\Subscription;
use App\User;
use App\Admin;

use Mail;
use Auth;

class AdminController extends Controller
{   
    
    /**
     * Login Page
     * 
     */
    public function login()
    {

        return view('admin.pages.login');

    }

    /**
     * Check for authentication
     * 
     */
    public function login_redirect(Request $request)
    {

        $credentials = $request->only('email', 'password');
        
        
        if(Auth::guard('admin')->attempt($credentials)) 
        {

            return redirect('admin');

        }
        
        return redirect()->back()->with('error', 'Incorrect name or password!');

    }

    /**
     * Logout for Admin
     * 
     */
    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect('admin/login');

    }
    
    public function home()
    {   

        // Daily Sales
        $last_day = date('Y-m-d', strtotime("-1 days"));

        // Month Range
        $fromMonth = date('Y-m-01');
        $toMonth = date('Y-m-31');

        // Year Range
        $fromYear = date('Y-01-01');
        $toYear = date('Y-12-31');

        $sales_monthly = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->where('status', 'paid')->sum('price');
        $sales_yearly = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromYear." 00:00:00", $toYear." 23:59:59"])->where('status', 'paid')->sum('price');
        $total_transactions = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromYear." 00:00:00", $toYear." 23:59:59"])->where('status', 'paid')->count();
        $count_active_user = User::where('status', 'active')->count();

        // January
        $fromJanuary = date('Y-01-01');
        $toJanuary = date('Y-01-31');
        $january = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromJanuary . " 00:00:00", $toJanuary . " 23:59:59"])->where('status', 'paid')->sum('price');

        // February
        $fromFebruary = date('Y-02-01');
        $toFebruary = date('Y-02-31');
        $february = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromFebruary . " 00:00:00", $toFebruary . " 23:59:59"])->where('status', 'paid')->sum('price');

        // Mac
        $fromMac = date('Y-03-01');
        $toMac = date('Y-03-31');
        $mac = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMac . " 00:00:00", $toMac . " 23:59:59"])->where('status', 'paid')->sum('price');

        // April
        $fromApril = date('Y-04-01');
        $toApril = date('Y-04-31');
        $april = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromApril . " 00:00:00", $toApril . " 23:59:59"])->where('status', 'paid')->sum('price');

        // May
        $fromMay = date('Y-05-01');
        $toMay = date('Y-05-31');
        $may = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMay . " 00:00:00", $toMay . " 23:59:59"])->where('status', 'paid')->sum('price');

        // June
        $fromJune = date('Y-06-01');
        $toJune = date('Y-06-31');
        $june = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromJune . " 00:00:00", $toJune . " 23:59:59"])->where('status', 'paid')->sum('price');

        // July
        $fromJuly = date('Y-07-01');
        $toJuly = date('Y-07-31');
        $july = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromJuly . " 00:00:00", $toJuly . " 23:59:59"])->where('status', 'paid')->sum('price');

        // August
        $fromAugust = date('Y-08-01');
        $toAugust = date('Y-08-31');
        $august = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromAugust . " 00:00:00", $toAugust . " 23:59:59"])->where('status', 'paid')->sum('price');

        // September
        $fromSeptember = date('Y-09-01');
        $toSeptember = date('Y-09-31');
        $september = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromSeptember . " 00:00:00", $toSeptember . " 23:59:59"])->where('status', 'paid')->sum('price');

        // October
        $fromOctober = date('Y-10-01');
        $toOctober = date('Y-10-31');
        $october = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromOctober . " 00:00:00", $toOctober . " 23:59:59"])->where('status', 'paid')->sum('price');

        // November
        $fromNovember = date('Y-11-01');
        $toNovember = date('Y-11-31');
        $november = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromNovember . " 00:00:00", $toNovember . " 23:59:59"])->where('status', 'paid')->sum('price');

        // December
        $fromDecember = date('Y-12-01');
        $toDecember = date('Y-12-31');
        $december = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromDecember . " 00:00:00", $toDecember . " 23:59:59"])->where('status', 'paid')->sum('price');

        // Completed Payment Report - Daily
        $count = 1;
        $users = User::all();
        $payment_history = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->where('status', 'paid')->orderBy('id','Desc')->paginate(10);
        $count_payment_history = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$last_day . " 00:00:00", $last_day . " 23:59:59"])->where('status', 'paid')->count();

        // Display upcoming next invoice
        // $next_date = date('Y-m-d',strtotime("next day of previous month"));
        $next_date = date('Y-07-d', strtotime("+1 days"));
        $next_date_previous_month = date("Y-m-d", strtotime($next_date . "-1 month"));
        $upcoming_next_payment = Subscription::whereRaw("(created_at >= ? AND created_at <= ?)", [$next_date_previous_month . " 00:00:00", $next_date_previous_month . " 23:59:59"])->orderBy('id', 'Desc')->limit(10)->get();


        // Failed Payment Report - Daily
        $failed_payment_history = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$last_day . " 00:00:00", $last_day . " 23:59:59"])->where('status', 'unpaid')->orderBy('id', 'Desc')->paginate(10);
        $count_failed_payment_history = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$last_day . " 00:00:00", $last_day . " 23:59:59"])->where('status', 'unpaid')->count();

        // List pending payment
        $payment_history_pending = PaymentHistory::where('status', 'pending')->whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth . " 00:00:00", $toMonth . " 23:59:59"])->orderBy('id','Desc')->get();

        return view('admin.pages.dashboard', compact('sales_monthly', 'sales_yearly','count_payment_history','payment_history', 'users','count','count_active_user','january','february','mac','april',
        'may','june','july','august','september','october','november','december', 'total_transactions', 'payment_history_pending', 'count_failed_payment_history', 'failed_payment_history', 'upcoming_next_payment'));

    }   

    public function users()
    {

        return view('admin.pages.users.index');

    }

    public function memberships()
    {

        return view('admin.pages.memberships.index');

    }

    public function courses()
    {

        return view('admin.pages.courses.index');

    }

    public function lessons()
    {

        return view('admin.pages.lessons.index');

    }

    public function subscriptions()
    {

        return view('admin.pages.subscription.index');

    }

    public function instructor()
    {

        return view('admin.pages.instructor.index');

    }

    public function admin_role()
    {

        return view('admin.pages.roles.index');

    }

    public function ticket_support()
    {

        $count = 1;
        $ticket_support = TicketSupport::all();

        return view('admin.pages.support.index', compact('ticket_support', 'count'));

    }

    /**
     * Show ticket from customer
     * 
     * 
     */
     public function show_ticket_support($id)
     {  

        $ticket_support = TicketSupport::where('ticket_support_id', $id)->first();
        $ticket_support_reply = TicketSupportReply::where('ticket_support_id', $id)->get();

        return view('admin.pages.support.reply', compact('ticket_support', 'ticket_support_reply'));

     }

     /**
      * Reply ticket support
      *
      *
      */
      public function reply_ticket_support(Request $request,$id)
      {

        $user = Auth::User();

        $ticket_support = TicketSupport::where('ticket_support_id', $id)->first();
        $ticket_support->status = 'waiting';

        TicketSupportReply::create([

            'ticket_support_id' => $id,
            'sender_answer' => $request->sender,
            'sender_name' => 'Support Roketez',

        ]);

        $ticket_support->save();

        Mail::to($user->email)->send(new UserRoketez());

        return redirect('admin/ticket-support')->with('success', 'Ticket has been sent to customer');

      }

    /**
     * Admin register page.
     * 
     * 
     */
    public function create()
    {

        return view('admin.pages.roles.create');

    }

    /**
     * Store data
     * 
     * 
     */
    public function store(Request $request)
    {

        Admin::create(array(

            'admin_id' => 'admin_' . uniqid(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role

        ));

        return redirect()->back()->with('success', 'Role Created!');

    }

    /**
     * List roles
     * 
     * 
     */
    public function index()
    {   

        $count = 1;
        $admins = Admin::where('role', '!=','Instructor')->orderBy('id','Desc')->get();

        return view('admin.pages.roles.list', compact('admins','count'));

    }

}
