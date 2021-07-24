<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StripeApi;

class StripeController extends Controller
{
    public function create()
    {
        return view('admin.pages.stripe.index');
    }

    public function store(Request $request)
    {
        StripeApi::create([
            'public_api_key' => $request->public_key,
            'secret_api_key' => $request->secret_key
        ]);

        return redirect()->back()->with('success', 'Stripe Api Key Updated!');
    }
}
