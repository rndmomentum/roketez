<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;
use App\User;
use App\PaymentHistory;
use App\Mail\ReleaseVideo;

use Mail;
use Auth;
use App\Jobs\SendEmailJob;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset(Auth::guard('admin')->user()->admin_id))
        {
            return redirect('admin/login');

        }else{

            $admin_id = Auth::guard('admin')->user()->admin_id;

            $count = 1;
            $courses = Courses::where('creator_id', $admin_id)->orderBy('id', 'Desc')->paginate(15);

            return view('admin.pages.courses.list', compact('courses','count'));

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pages.courses.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $admin_id = Auth::guard('admin')->user()->admin_id;

        // Image
        $imagename = 'img_' . uniqid().'.'.$request->image->extension();
		$request->image->move(public_path('image/courses'), $imagename);

        $course = new Courses;

        $course->course_id = 'course_' . uniqid();
        $course->title = $request->title;
        $course->description = $request->description;
        $course->image = $imagename;     
        $course->creator_id = $admin_id;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->locked = 'yes';

        $course->save();

        return redirect()->back()->with('success', 'Course Created!');

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
        
        if(!isset(Auth::guard('admin')->user()->admin_id))
        {
            return redirect('admin/login');

        }else{

            $admin_id = Auth::guard('admin')->user()->admin_id;

            $course = Courses::where('course_id', $id)->where('creator_id', $admin_id)->first();

            return view('admin.pages.courses.edit', compact('course'));

        }

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

        $course = Courses::where('course_id', $id)->first();

        if($request->image == "")
        {

            $course->title = $request->title;
            $course->description = $request->description;
            $course->category = $request->category;
            $course->level = $request->level;
            $course->locked = $request->locked;

        }else{

            // Image
            $imagename = 'img_' . uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('image/courses'), $imagename);

            $course->title = $request->title;
            $course->description = $request->description;
            $course->category = $request->category;
            $course->image = $imagename;   
            $course->level = $request->level;
            $course->locked = $request->locked;

        }

        // $emails = User::where('status', 'active')->get();
        // $course_id = $id;

        // if($request->locked == 'no')
        // {   
        //     $emails = ['danial0597@gmail.com', 'pelikb@gmail.com', 'danialadzhar@momentuminternet.com'];
        //     foreach($emails as $email)
        //     {
        //         dispatch(new SendEmailJob($email));
        //     }
        // }

        $course->save();
        return redirect()->back()->with('success', 'Course Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::where('course_id', $id);
        $payment_history = PaymentHistory::where('course_id', $id);

        $course->delete();
        $payment_history->delete();

        return redirect()->back()->with('success', 'Course Deleted!');

    }

    /**
     * Search user
     * 
     * 
     */
    public function search(Request $request)
    {   
        $admin_id = Auth::guard('admin')->user()->admin_id;

        $count = 1;
        $courses = Courses::where('title','LIKE','%'. $request->search.'%')->orWhere('description','LIKE','%'. $request->search.'%')->paginate(15);

        if(count($courses) > 0)
        {

            return view('admin.pages.courses.list', compact('courses','count'));

        }else{

            return redirect()->back()->with('error', 'Sorry not found!');

        }
    }
}
