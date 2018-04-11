<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Idea;
use Carbon\Carbon;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'View All Topic';
        $topics = Topic::latest()->get();
        return view ('backend.pages.topic.view_topic', compact('title','topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = 'Add new Topic';
        return view ('backend.pages.topic.create_topic', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate(request(),[
            'topic_title' => 'required|min:3',
            'topic_des' => 'required|min:3',
            'start_date' => 'required',
            'closure_date' => 'required',
            'final_date' => 'required',
            'status' => 'required',
        ]);

        $closure_date = Carbon::parse(request('closure_date'))->format('Y-m-d');
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');

        $final_date = Carbon::parse(request('final_date'))->format('Y-m-d');

        if($validate)
        {
            Topic::create([
                'title' => request('topic_title'),
                'description' => request('topic_des'),
                'start_date' => $start_date,
                'closure_date' => $closure_date,
                'end_date' => $final_date,
                'status' => request('status')
            ]);

            return redirect()->route('viewTopic')->withMsgsuccess('Topic created successfully');
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
    public function edit($id)
    {
        $title = 'Edit Existing Topic';
        $topic = Topic::find($id);
        return view ('backend.pages.topic.edit_topic', compact('title','topic'));
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
        $validate = $this->validate(request(),[
            'topic_title' => 'required|min:3',
            'topic_des' => 'required|min:3',
            'start_date' => 'required',
            'closure_date' => 'required',
            'final_date' => 'required',
            'status' => 'required',
        ]);
        $closure_date = Carbon::parse(request('closure_date'))->format('Y-m-d');
        $start_date = Carbon::parse(request('start_date'))->format('Y-m-d');

        $final_date = Carbon::parse(request('final_date'))->format('Y-m-d');

        if($validate)
        {
            Topic::find($id)->update([
                'title' => request('topic_title'),
                'description' => request('topic_des'),
                'start_date' => $start_date,
                'closure_date' => $closure_date,
                'end_date' => $final_date,
                'status' => request('status')
            ]);

            return redirect()->route('viewTopic')->withMsgsuccess('Topic updated successfully');
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
        $ideas = Idea::where('topic_id', $id)->get();

        if($ideas->count()){
            return redirect()->back()->withMsgerror('Unable to delete this topic, It is being used');
        }else{
            Topic::find($id)->delete();
            return redirect()->back()->withMsgsuccess('Topic deleted sucessfully');
        }

        dd($ideas);
    }
}
