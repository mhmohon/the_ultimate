<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotifyAuthorReplies;
use App\User;
use App\Idea;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validate = $this->validate(request(),[
            'comment_detail' => 'required|min:3',
            'agree' => 'required',
            'postas' => 'required',
        ]);
        
        if($validate){

        $user_id = \Auth::user()->id;
        $user_role = \Auth::user()->user_role;
        if(request('postas') == 'realuser'){

            if($user_role == '5'){
                $name = \Auth::user()->student->first_name. ' '.\Auth::user()->student->last_name;
            }else{
                $name = \Auth::user()->staff->first_name. ' '.\Auth::user()->staff->last_name;
            }
            
            $comment = Comment::create([
                'description' => request('comment_detail'),
                'name' => $name,
                'status' => '1',
                'user_id' => $user_id,
                'idea_id' => $id,

            ]);

        }elseif(request('postas') == 'anynomous'){
            $comment = Comment::create([
                'description' => request('comment_detail'),
                'name' => 'anynomous',
                'status' => '1',
                'user_id' => $user_id,
                'idea_id' => $id,

            ]);
        }

        //send email when comment to idea
        $idea = Idea::find($id);
        $author = User::find($idea->user_id);
        
        if($user_role == '5'){
            //send email when comment to idea
            \Notification::send($author, new NotifyAuthorReplies($idea,$comment));
        }

        return redirect()->route('ideaShow', $id)->withMsgsuccess('Your comment has been posted sucessfully.');

        }else{
            return redirect()->back()->withInput();
        }
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
    public function edit($idea_id, $comment_id)
    {
        $idea = Idea::find($idea_id);
        $comment = Comment::find($comment_id);
        
        return view('frontend.pages.comment.edit_comment', compact('comment','idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idea_id, $comment_id)
    {
        $validate = $this->validate(request(),[
            'comment_detail' => 'required|min:3',
            'agree' => 'required',
            'postas' => 'required',
            
        ]);
        if($validate){

        $user_id = \Auth::user()->id;
        $user_role = \Auth::user()->user_role;
        if(request('postas') == 'realuser'){
            if($user_role == '5'){
                $name = \Auth::user()->student->first_name. ' '.\Auth::user()->student->last_name;
            }else{
                $name = \Auth::user()->staff->first_name. ' '.\Auth::user()->staff->last_name;
            }
            
            Comment::find($comment_id)->update([
                'description' => request('comment_detail'),
                'name' => $name,
            ]);

        }elseif(request('postas') == 'anynomous'){

            Comment::find($comment_id)->update([
                'description' => request('comment_detail'),
                'name' => 'anynomous',

            ]);
        }
        return redirect()->route('ideaShow', $idea_id)->withMsgsuccess('Your Comment has been Updated.');

        }else{
            return redirect()->back()->withInput();
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
