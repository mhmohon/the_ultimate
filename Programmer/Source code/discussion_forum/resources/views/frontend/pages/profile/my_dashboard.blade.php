@extends ('frontend.layouts.master')

@section('page_title', 'View Topic')

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 breadcrumbf">
            <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a>My Dashboard</a>
        </div>
    </div>
</div>

<div class="container">
    
    @if($user->user_role == '5')
        <h1 style="color: #697683;">Welcome {{ $user->student->first_name. ' ' .$user->student->last_name }}!</h1>
    @else
        <h1 style="color: #697683;">Welcome {{ $user->staff->first_name. ' ' .$user->staff->last_name }}!</h1>
    @endif
    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default panel-counter">
                <div class="panel-heading pnl-head">Idea</div>

                <div class="panel-body pnl-body">{{ !empty($myIdea) ? $myIdea->count() : '0' }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default panel-counter">
                <div class="panel-heading pnl-head">Replies</div>
                <div class="panel-body pnl-body">{{ !empty($myComment) ? $myComment->count() : '0' }}</div>
            </div>
        </div>
        
    </div>
    
    <div class="row profile-latest-items">
    @if(checkPermission(['student']))
        <div class="col-md-6">
            <h3>Latest Idea</h3>

            @if($myIdea->count())
            @foreach($myIdea as $idea)
			<div class="list-group">
                <a href="{{ route('ideaShow', $idea->id) }}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $idea->title }}</h4>
                    <p><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($idea->created_at)->diffForHumans() }}</p>
                       
                </a>
            </div>
            @endforeach
            @else
                <div class="list-group">
                    <a href="" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $user->student->first_name. ' ' .$user->student->last_name }} has not posted any idea yet</h4>
                        
                    </a>
                </div>
            @endif
        </div>
        @endif
        <div class="col-md-6">
            <h3>Latest Replies</h3>
            @if($myComment->count())
            @foreach($myComment as $comment)
            <div class="list-group">
                <a href="{{ route('ideaShow', $comment->idea->id) }}" class="list-group-item">
                    <h4 class="list-group-item-heading">{{ $comment->description }}</h4>
                    <p><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
                </a>
            </div>
            @endforeach
            @else
                <div class="list-group">
                    <a href="" class="list-group-item">
                        @if(\Auth::user()->user_role == '5')
                           <h4 class="list-group-item-heading">{{ $user->student->first_name. ' ' .$user->student->last_name }} has not posted any replies yet</h4>
                        @else
                            <h4 class="list-group-item-heading">{{ $user->staff->first_name. ' ' .$user->staff->last_name }} has not posted any replies yet</h4>
                        @endif
                       
                       
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection