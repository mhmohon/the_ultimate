<?php

namespace App\Http\Controllers;

use Request;
use App\Topic;
use DB;
use App\Idea;
use App\User;
use App\Laravellikecomment_total_like;
use App\Comment;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $currentDate = Carbon::now()->toDateString();
        
        $latestTopics = Topic::where('start_date', '<=', $currentDate)
                                ->where('status', 1)
                                ->orwhere('status', 3)
                                ->latest()->paginate(5);

        return view('frontend.pages.home', compact('latestTopics','ideaCount'));
    }
    public function terms()
    {   
        

        return view('frontend.pages.terms&conditon');
    }

    public function topicShow($id)
    {   
        $topic = Topic::find($id); // finding the post
        
        $ideas = Idea::where('topic_id', $id)
                        ->where('status', 1)
                        ->latest()->paginate(5);

        if($topic){
            
            $topic->increment('view');
        }
        return view('frontend.pages.view_topic', compact('topic','ideas'));
    }

    public function ideaShow($id)
    {   
        $idea = Idea::find($id); // finding the idea

        if($idea->status == '1'){

            $comments = Comment::where('idea_id', $id)
                                ->where('status', 1)
                                ->latest()->paginate(10);
            $idea->increment('view');
            
            return view('frontend.pages.idea.view_idea', compact('idea','comments'));
        }else{
            return redirect('home')->withMsginfo('This idea is not yet approved');;
        }
        
    }

    public function myDashboard()
    {   
        $user_id = \Auth::user()->id; // finding the user id
        $user = User::find($user_id);
        $myIdea = Idea::where('user_id', $user_id)
                                ->latest()
                                ->limit(5)
                                ->get();
        $myComment = Comment::where('user_id', $user_id)
                                ->latest()
                                ->limit(5)
                                ->get();
        return view('frontend.pages.profile.my_dashboard', compact('user','myIdea','myComment'));
    }

    public function most_idea_popular()
    {   
        
        $ideas = DB::table('ideas')
                    ->join('laravellikecomment_total_likes', 'ideas.id', '=', 'laravellikecomment_total_likes.item_id')
                    ->select('ideas.*')
                    ->where('ideas.status', '=', '1')
                    ->orderBy('laravellikecomment_total_likes.total_like', 'desc')
                    ->paginate(5);

        return view('frontend.pages.idea.short_idea_popular', compact('ideas'));
    }

    public function most_idea_view($short, $orderby)
    {   
        $ideas = Idea::where('status',1)
                        ->orderBy($short,$orderby)
                        ->paginate(5);
        
        return view('frontend.pages.idea.short_idea', compact('ideas'));
    }

    public function latest_idea()
    {   
        $ideas = Idea::where('status', 1)
                        ->latest()
                        ->paginate(5);
        return view('frontend.pages.idea.short_idea', compact('ideas'));
    }

    public function latest_comment()
    {   
        $comments = Comment::latest()->paginate(10);
        return view('frontend.pages.comment.short_comment', compact('comments'));
    }

    public function searchTopic(Request $request)
    {   
        $input = Request::input('search_value');
        
        $latestTopics = Topic::where('title', 'LIKE', '%'. $input .'%')
                            ->paginate(5);
        
        return view('frontend.pages.home',compact('latestTopics','input'));
    }
}
