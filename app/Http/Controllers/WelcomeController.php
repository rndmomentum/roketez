<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
}
