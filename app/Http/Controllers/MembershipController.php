<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memberships;
use App\Subscription;
use App\User;
use Auth;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $memberships = Memberships::orderBy('id','Desc')->get();

        return view('admin.pages.memberships.list', compact('memberships','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        return view('admin.pages.memberships.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $membership_id = 'price_1IE4s8KRoCtjyNHUF5G9EY5U';

        Memberships::create(array(

            'membership_id' => $request->membership_id,
            'title' => $request->title,
            'description' => $request->description,
            'original_price' => $request->original_price,
            'sales_price' => $request->sales_price,
            'status' => 'deactive',
            'trial_day' => $request->trial_day,

        ));

        return redirect()->back()->with('success', 'Membership Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $membership = Memberships::where('membership_id', $id)->first();

        return view('admin.pages.memberships.edit', compact('membership'));

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
        
        $membership = Memberships::where('membership_id', $id)->first();

        $membership->title = $request->title;
        $membership->description = $request->description;
        $membership->original_price = $request->original_price;
        $membership->sales_price = $request->sales_price;
        $membership->status = $request->status;
        $membership->trial_day = $request->trial_day;

        $membership->save();

        return redirect()->back()->with('success', 'Membership Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Memberships::where('membership_id', $id);
        $subscription = Subscription::where('membership_id', $id);

        // Get User ID 
        $get_subscription = Subscription::where('membership_id', $id)->first();
        $user = User::where('user_id', $get_subscription->user_id);

        $membership->delete();
        $subscription->delete();
        $user->delete();

        return redirect()->back()->with('success', 'Membership Deleted!');
    }
}
