<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class InstructorController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $count = 1;
        $admins = Admin::where('role', 'Instructor')->orderBy('id','Desc')->get();

        return view('admin.pages.instructor.list', compact('admins','count'));
    }

    /**
     * Display a mainpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function main()
    {
        return view('admin.pages.instructor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.instructor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Admin::create(array(

            'admin_id' => 'admin_' . uniqid(),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Instructor'

        ));

        return redirect()->back()->with('success', 'Instructor Created!');
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
        $admin = Admin::find($id);

        return view('admin.pages.instructor.edit', compact('admin'));
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
        $admin = Admin::where('admin_id', $id)->first();

        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();

        return redirect()->back()->with('success', 'Instructor Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $admin = Admin::where('admin_id', $id)->where('role', 'Instructor');

        $admin->delete();

        return redirect()->back()->with('success', 'Instructor Deleted!');

    }
}
