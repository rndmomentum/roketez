<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Lessons;
use App\Memberships;
use App\PaymentHistory;
use App\StripeApi;
use App\Subscription;
use App\TicketSupport;
use App\User;
use App\Interest;

use Auth;
use Stripe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
        $this->middleware('auth');
    }

    /**
     * Show user home
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                // Latest Courses
                $latest_courses = Courses::where('locked', 'no')->where('category', '!=', 'sc')->orderBy('id', 'Desc')->limit(4)->get();

                // Marketing
                $marketing = Courses::where('locked', 'no')->where('category', 'marketing')->inRandomOrder()->limit(4)->get();

                // Sales
                $sales = Courses::where('locked', 'no')->where('category', 'sales')->inRandomOrder()->limit(4)->get();

                // Motivation
                $motivation = Courses::where('locked', 'no')->where('category', 'motivation')->inRandomOrder()->limit(4)->get();

                // Copywriting
                $copywriting = Courses::where('locked', 'no')->where('category', 'copywriting')->inRandomOrder()->limit(4)->get();

                // Branding
                $branding = Courses::where('locked', 'no')->where('category', 'branding')->inRandomOrder()->limit(4)->get();


        

                // All course
                $courses = Courses::where('locked', 'no')->where('category', '!=', 'sc')->orderBy('id', 'Desc')->get();

                // $pluck_courses = Courses::where('locked', 'no')->where('category', '!=', 'sc')->orderBy('id', 'Desc')->pluck('course_id');
                // $lessons = Lessons::whereIn('course_id', $pluck_courses)->get();

                return view('home', compact('courses', 'latest_courses', 'marketing', 'sales', 'motivation', 'copywriting', 'branding'));

            }

        }

    }

    /**
     * Show selected course.
     *
     *
     */
    public function courses($id)
    {

        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                // $course = Courses::where('course_id', $id)->first();
                // $lessons = Lessons::where('course_id', $id)->get();

                // Get Admin Name
                // $get_admin = Admin::where('admin_id', $course->creator_id)->first();

                // Get First Lessons
                $get_first_lesson = Lessons::where('course_id', $id)->first();

                // Get Discount
                // $get_membership = Subscription::where('user_id', $user->user_id)->first();
                // $membership = Memberships::where('membership_id', $get_membership->membership_id)->first();

                // Count Lessons
                // $count_lessons = Lessons::where('course_id', $id)->count();

                // return view('pages.courses.index', compact('course','lessons', 'membership', 'count_lessons','get_admin', 'get_first_lesson'));
                return redirect('lesson/' . $get_first_lesson->lesson_id);
            }
        }

    }

    /**
     * Show lesson from selected course.
     *
     *
     */
    public function lessons($id)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                $get_course_id = Lessons::where('lesson_id', $id)->pluck('course_id');

                // Active User
                $lesson = Lessons::where('lesson_id', $id)->first();
                $lessons = Lessons::where('course_id', $get_course_id)->get();

                $course = Courses::where('course_id', $lesson->course_id)->first();

                // Trial
                // $lessons_trial = Lessons::where('course_id', $get_course_id)->limit(2)->get();

                return view('pages.lessons.index', compact('lesson', 'lessons', 'user', 'course'));

            }

        }

    }

    /**
     * Display user profile
     *
     *
     */
    public function myaccount()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                return view('pages.profile', compact('user'));

            }
        }
    }

    /**
     * User can update or edit their own profile.
     *
     *
     */
    public function update_myaccount($id, Request $request)
    {
        $user = User::where('user_id', $id)->first();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        $user->save();

        return redirect()->back()->with('success', 'Profile Updated!');
    }

    /**
     * List purchase courses
     *
     *
     */
    public function mycourses()
    {

        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                $courses = Courses::orderBy('id', 'Desc')->get();
                $order_items = PaymentHistory::where('user_id', $user->user_id)->get();

                return view('pages.mycourses', compact('courses', 'order_items'));
            }
        }

    }

    /**
     * Subscription history
     *
     *
     */
    public function subscription_history()
    {

        $user = Auth::user();

        $subscriptions = Subscription::where('user_id', $user->user_id)->get();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                // Define api key
                $apikey = StripeApi::orderBy('id', 'Desc')->first();

                Stripe\Stripe::setApiKey($apikey->secret_api_key);

                // Get Membership History
                $memberships = Memberships::orderBy('id', 'Desc')->get();
                $payment_history = PaymentHistory::where('user_id', $user->user_id)->orderBy('id', 'Desc')->get();

                // Subscription Detail
                $subscription = Subscription::where('user_id', $user->user_id)->first();
                $get_membership_name = Memberships::orderBy('id', 'Desc')->first();

                // Get status subscription
                $get_status_subscription = Stripe\Subscription::retrieve($subscription->subscription_id);

                return view('pages.subscriptionhistory', compact('user', 'memberships', 'payment_history', 'subscription', 'get_membership_name', 'get_status_subscription'));
            }
        }

    }

    /**
     * Search available course
     *
     *
     */
    public function search_courses(Request $request)
    {

        $user = Auth::user();

        // Course not purchase yet
        $course = Courses::where('title', 'LIKE', '%' . $request->c . '%')->orWhere('description', 'LIKE', '%' . $request->c . '%')->get();

        // Get Discount
        $get_membership = Subscription::where('user_id', $user->user_id)->first();
        $membership = Memberships::where('membership_id', $get_membership->membership_id)->first();

        if (count($course) > 0) {
            return view('search', compact('membership'))->withDetails($course)->withQuery($request->c);

        } else {

            return view('search')->with('error', 'No Details found. Try to search again !');

        }

    }

    /**
     * Failed Payment Pages
     *
     *
     */
    public function failed_payment_page()
    {

        $user = Auth::user();

        if ($user->status == 'active' || $user->status == 'trialing') {
            return redirect('explore');

        } elseif ($user->status == 'canceled') {

            return redirect('account-inactive');

        } elseif ($user->status == 'pending') {

            return redirect('signup');

        } else {

            return view('pages.status.paymentfailed');

        }

    }

    /**
     * Failed Payment Pages
     *
     *
     */
    public function inactive_account_page()
    {

        $user = Auth::user();

        if ($user->status == 'active' || $user->status == 'trialing') {

            return redirect('explore');

        } elseif ($user->status == 'canceled') {

            return view('pages.status.canceled');

        } elseif ($user->status == 'pending') {

            return redirect('signup');

        } else {

            return redirect('payment-failed');

        }

    }

    /**
     * Ticket Support Pages
     *
     *
     */
    public function ticket_support()
    {

        $count = 1;
        $user = Auth::User();
        $ticket_support = TicketSupport::where('user_id', $user->user_id)->get();

        return view('pages.support.index', compact('ticket_support', 'count'));

    }

    /**
     * Sign out from system
     *
     *
     */
    public function signout()
    {
        Auth::logout();

        return redirect('/');
    }

    // Interest Page
    public function choose_interest()
    {

        $user = Auth::User();

        if ($user->status == 'pending') {

            return redirect('signup');

        } else {

            if ($user->status == 'canceled') {

                return redirect('account-inactive');

            } elseif ($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {

                return redirect('payment-failed');

            } else {

                return view('pages.signup.interests');

            }
        }
    }

    // Store interest
    public function store_interest(Request $request)
    {
        $user = Auth::User();

        foreach ($request->interest as $key => $value) {
            Interest::create([

                'user_id' => $user->user_id,
                'list_interest' => $value,

            ]);
        }

        return redirect('explore');
    }

    // categories
    public function categories()
    {
        return view('pages.categories.index');
    }
}
