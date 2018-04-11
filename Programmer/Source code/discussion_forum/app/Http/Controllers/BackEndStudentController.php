<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\Student;

class BackEndStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'View All Student';
        $users = User::where('user_role', 5)
                    ->latest()->get();
        
        return view ('backend.pages.student.view_student', compact('title','users'));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
      
        $departments = Department::latest()->pluck('name', 'id');
        return view ('backend.pages.student.edit_student', compact('user','departments'));
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
        $this->validate(request(),[

            'email' => 'required|string|email|unique:users,email,'.$id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|min:11',
            'gender' => 'required',
            'status' => 'required',

        ]);

        $user = User::find($id)->update([
            'email' => request('email'),
            'user_status' => request('status'),
        ]);

        $student = Student::where('user_id', $id)->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'gender' => request('gender'),
            'phone' => request('phone'),
            'user_id' => $id,
            'dep_id' => request('department'),
        ]);

        if($user && $student){
            
            return redirect()->route('viewStudent')->with('msgsuccess','Profile updated successfully');
        }
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
