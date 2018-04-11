<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotifyAuthonApprove;
use App\Idea;
use App\User;
use App\DepartmentHead;
class BackendIdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'View All Idea';
        $ideas = Idea::latest()->get();

        return view ('backend.pages.idea.view_idea', compact('title','ideas'));
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
    public function edit($id)
    {
        $title = 'Edit Existing Idea';
        $idea = Idea::find($id);
        return view ('backend.pages.idea.edit_idea', compact('title','idea'));
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
        
        Idea::find($id)->update([
            
            'status' => request('status')
        ]);

        if(request('status') == '1'){
            $idea = Idea::find($id);
            $author = User::find($idea->user_id);
            $depertment = DepartmentHead::where('dep_id', $author->student->dep_id)->first();

            $user = User::find($depertment->user_id);
            
            \Notification::send($author, new NotifyAuthonApprove($idea));
            \Notification::send($user, new NotifyAuthonApprove($idea));

        }
        return redirect()->route('viewIdea')->withMsgsuccess('Idea updated successfully');
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
