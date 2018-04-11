<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Idea;
use App\Comment;
use App\User;
use App\Staff;
use DB;
use PDF;
use Charts;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $chart = Charts::database($ideas, 'bar', 'highcharts')
                ->title('Monthly Post Idea')
                ->elementLabel("Total Idea")
                ->responsive(false)
                ->groupByMonth(date('Y'), true);

        return view ('backend.pages.home', compact('chart'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function my_profile()
    {   
        $user_id = \Auth::user()->id;
        $user = User::find($user_id);
        return view ('backend.pages.my_profile', compact('user'));
    }

    public function my_profile_update(Request $request, $id)
    {   
        $this->validate(request(),[
            'email' => 'required|string|email|unique:users,email,'.$id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|min:11',
            'gender' => 'required',

        ]);

        $user = User::find($id)->update([
            'email' => request('email'),
        ]);

        $staff = Staff::where('user_id', $id)->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'gender' => request('gender'),
            'phone' => request('phone'),
            'user_id' => $id,
        ]);

        if($user && $staff){
            
            return redirect()->back()->with('msgsuccess','Profile updated successfully');
        }
    }

    public function show_read($idea_id, $notify_id)
    {
        
        auth()->user()->unreadNotifications->find($notify_id)->markAsRead(); 
        
        return redirect()->route('editIdea',$idea_id);
    }

    public function notifyReadAll()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function downloadPDF($id)
    {
        $idea = Idea::find($id);
        $comments = Comment::where('idea_id', $id)->paginate();
        $pdf = PDF::loadView('backend.pages.pdf.view_idea', compact('idea','comments'))->save(public_path().'\download\idea_file.pdf');
        
        $files = glob(public_path('download/*'));

        \Zipper::make(public_path('\download\idea.zip'))->add($files)->close();
        $zipName = public_path('\download\idea.zip');

        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$zipName."\"");
        readfile($zipName);
        
        $file = new Filesystem;
        $file->cleanDirectory(public_path().'\download');
    }
}
