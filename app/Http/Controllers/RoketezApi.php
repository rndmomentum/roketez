<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\PaymentHistory;
use App\Courses;
use App\Lessons;
use App\User;
use Auth;

class RoketezApi extends Controller
{
    public function getReportTransaction()
    {
        // Month Range
        $fromMonth = date('Y-m-01');
        $toMonth = date('Y-m-31');
        $first = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->where('price', '199')->count();
        $second = PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->where('price', '200')->count();

        $getArray = ['first' => $first,'second' => $second];

        return $getArray;
    }
    
    public function getReportCollection()
    {   
        // Month Range
        $fromMonth = date('Y-m-01');
        $toMonth = date('Y-m-31');
        return PaymentHistory::whereRaw("(created_at >= ? AND created_at <= ?)", [$fromMonth." 00:00:00", $toMonth." 23:59:59"])->sum('price');
    }

    public function latestCourses()
    {
        $courses = Courses::where('locked', 'no')->where('category', '!=', 'sc')->orderBy('id', 'Desc')->limit(5)->get();

        return $courses->toJson();
    }
    
    /*
    |--------------------------------------------------------------------------
    | Courses API
    |--------------------------------------------------------------------------
    |
    */


    /**
     * Marketing
     * 
     * 
     */
    public function marketingCourses()
    {
        $courses = Courses::where('locked', 'no')->where('category', 'marketing')->orderBy('id', 'Desc')->get();


        return $courses->toJson();
        // dd($courses);
    }

    /**
     * Sales
     * 
     * 
     */
    public function salesCourses()
    {
        $courses = Courses::where('locked', 'no')->where('category','sales')->orderBy('id', 'Desc')->get();

        return $courses->toJson();
    }

    /**
     * Sales
     * 
     * 
     */
    public function brandingCourses()
    {
        $courses = Courses::where('locked', 'no')->where('category','branding')->orderBy('id', 'Desc')->get();

        return $courses->toJson();
    }

    /**
     * Motivation
     * 
     * 
     */
    public function motivationCourses()
    {
        $courses = Courses::where('locked', 'no')->where('category','motivation')->orderBy('id', 'Desc')->get();

        return $courses->toJson();
    }

    /**
     * Copywriting
     *
     *
     */
    public function copywritingCourses()
    {
        $courses = Courses::where('locked', 'no')->where('category','copywriting')->orderBy('id', 'Desc')->get();

        return $courses->toJson();
    }



    /*
    |--------------------------------------------------------------------------
    | Others API
    |--------------------------------------------------------------------------
    |
    */

    public function getCourse($id)
    {
        $courses = Courses::where('locked', 'no')->where('category', '!=', 'sc')->where('course_id', $id)->orderBy('id', 'Desc')->first();

        return $courses->toJson();
    }

    public function getLesson($id)
    {
        $lesson = Lessons::where('course_id', $id)->first();

        return $lesson->toJson();
    }

    public function getLessons($id)
    {
        $lessons = Lessons::where('course_id', $id)->get();

        return $lessons->toJson();

    }

    public function login(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];


        if (Auth::guard('app_user')->attempt($credentials)) {
            
            return $credentials;
            
        }else{

            $failed = ['error' => 'failed'];
            return $failed;

        }

    }
}
