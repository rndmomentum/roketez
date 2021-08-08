<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lessons;
use App\Courses;
use Auth;

class LessonController extends Controller
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
            $courses = Courses::all();
            $lessons = Lessons::where('creator_id', $admin_id)->orderBy('id', 'Desc')->paginate(10);

            return view('admin.pages.lessons.list', compact('lessons','count','courses'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $courses = Courses::orderBy('id', 'Desc')->get();

        return view('admin.pages.lessons.create', compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Lessons::create(array(

            'lesson_id' => uniqid(),
            'title' => $request->title,
            'course_id' => $request->course,
            'link_video' => $request->link,
            'duration' => $request->duration,
            'creator_id' => Auth::guard('admin')->user()->admin_id,

        ));

        return redirect()->back()->with('success', 'Lesson Created!');


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

            $lesson = Lessons::where('lesson_id', $id)->where('creator_id', $admin_id)->first();
            return view('admin.pages.lessons.edit', compact('lesson'));
            
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

        $lesson = Lessons::where('lesson_id', $id)->first();

        $lesson->title = $request->title;
        $lesson->course_id = $request->course;
        $lesson->link_video = $request->link;
        $lesson->duration = $request->duration;

        $lesson->save();

        return redirect()->back()->with('success', 'Lesson Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $lesson = Lessons::where('lesson_id', $id);

        $lesson->delete();


        return redirect()->back()->with('success', 'Lesson Deleted!');

    }

    /**
     * Search lessons
     * 
     * 
     */
    public function search(Request $request)
    {   
        $count = 1;
        $courses = Courses::all();
        $lessons = Lessons::where('title','LIKE','%'. $request->search.'%')->paginate(10);

        if(count($lessons) > 0)
        {

            return view('admin.pages.lessons.list', compact('lessons','count','courses'));

        }else{

            // return view('admin.pages.users.list', compact('users','count'));
            return redirect()->back()->with('error', 'Sorry not found!');

        }
    }
}
