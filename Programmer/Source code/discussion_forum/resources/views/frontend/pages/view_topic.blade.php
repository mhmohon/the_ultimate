@extends ('frontend.layouts.master')

@section('page_title', 'View Topic')

@section('extra_css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
@endsection
@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ route('home') }}">General Discussion</a> <span class="diviver">&gt;</span> <a href="#">Topic Details</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post beforepagination">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/topic.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left ">
                            <h2>{{ $topic->title }}</h2>
                            <p>{{ $topic->description }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="posted pull-left"><i class="fa fa-clock-o"></i>  Posted {{ \Carbon\Carbon::parse($topic->start_date)->diffForHumans() }}</div>
                        
                        @if(checkPermission(['student']))

                        @if($topic->closure_date >= \Carbon\Carbon::now()->toDateString() &&  $topic->start_date <= \Carbon\Carbon::now()->toDateString())

                            <div class="next pull-right">                                         
                                <a href="{{ route('addIdea', $topic->id) }}"><i class="fa fa-share"></i></a>

                            </div>
                        @endif
                        @endif

                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
                

                <div class="paginationf">
                    <div class="pull-left"><a class="prevnext"><i class="fa fa fa-comments"></i>All Idea</a></div>
                    <div class="pull-left">
                       
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                @if($ideas->count())
                @foreach($ideas as $idea) 
                <!-- Idea -->
                <div class="post">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/idea.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left idea-detail-mini">
                            <h2>
                                <a href="{{ route('ideaShow', $idea->id) }}">{{ $idea->title }}</a>
                                @if(\Auth::user()->id == $idea->user_id)
                                    <span class="pull-right">
                                        <a href="{{ route('EditIdea', [$idea->topic_id, $idea->id]) }}" class="btn btn-danger">Edit</a>
                                    </span>
                                @endif
                            </h2>
                            <hr>
                            <p>{!! $idea->description !!}</p>
                        </div>

                        <!-- idea info -->
                        <div class="postinfo pull-right idea-info-mini">
                            <div class="comments">
                                <div class="commentbg">
                                    {{ number_format($idea->comment->count()) }}
                                    <div class="mark"></div>
                                </div>

                            </div>
                            <div class="views"><i class="fa fa-eye"></i> {{ number_format($idea->view) }}</div>
                                                           
                        </div>

                        <div class="clearfix"></div>
                    <!-- idea info -->
                    </div>                              
                    <div class="postinfobot">
                        <!-- idea title -->
                       <div class="posted pull-left idea-user-mini">
                           <i class="fa fa-user-o"></i> {{ $idea->name }} &nbsp <i class="fa fa-clock-o"></i> {{ $idea->created_at->diffForHumans() }}
                       </div>
                        <!-- idea title -->

                        <!-- Like / dislike -->
                        <div class="likeblock pull-right" style="font-size: 20px;">
                            @include('laravelLikeComment::like', ['like_item_id' => $idea->id])
                        </div>
                        <!-- Like / dislike -->

                        <div class="clearfix"></div>
                    </div>

                    
                </div><!-- Idea -->
                
                
                @endforeach
                @else
                    <div class="post">
                       
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/idea.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left">
                            <h2>
                               No Idea has been posted on this topic.
                            </h2>
                            <hr>
                        </div>

                        
                        <div class="clearfix"></div>
                    <!-- idea info -->
                    </div> 
                    </div>
                @endif
                {{ $ideas->links() }}
                <br>
                @if(checkPermission(['student']))
                <div class="post pull-left">
                    <div class="postreply">
                        
                        @if($topic->closure_date >= \Carbon\Carbon::now()->toDateString() &&  $topic->start_date <= \Carbon\Carbon::now()->toDateString() && $topic->status == '1')
                            <div class="pull-left"><a href="{{ route('addIdea', $topic->id) }}" class="btn btn-primary">Post an Idea</a>&nbsp </div>
                        @else
                            <div class="pull-left">
                                <a href="{{ URL::previous() }}" class="btn btn-danger" style="padding: 9px;">Not Available</a>&nbsp
                            </div>
                        @endif
                        <div class="pull-left"><a href="{{ URL::previous() }}" class="btn btn-info" style="padding-bottom: 12px;">Back</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @else
                <div class="post pull-left">
                    <div class="postreply">
                            
                        <div class="pull-left"><a href="{{ URL::previous() }}" class="btn btn-primary">Back</a></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endif
            </div>
           
            <!-- Left Sidebar -->
            @include ('frontend.layouts.right_sidebar')
        </div>
    </div>

    
@endsection

@section('extra_js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
        
    
@endsection