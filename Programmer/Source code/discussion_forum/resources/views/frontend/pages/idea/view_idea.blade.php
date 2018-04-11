@extends ('frontend.layouts.master')

@section('page_title', 'View Idea')

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
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ URL::previous() }}">Topic discussion</a> <span class="diviver">&gt;</span> <a>Idea Details</a>
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
                                <img src="{{ asset('photos/icon/idea.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext idea-text pull-left">
                            <h2>{{ $idea->title }}
                                @if(\Auth::user()->id == $idea->user_id)
                                    <span class="pull-right">
                                        <a href="{{ route('EditIdea', [$idea->topic_id, $idea->id]) }}" class="btn btn-danger">Edit</a>
                                    </span>
                                @endif
                            </h2>
                            <p>{!! $idea->description !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="posted pull-left">
                            <i class="fa fa-user-o"></i> {{ $idea->name }} &nbsp <i class="fa fa-clock-o"></i>  Posted on : {{ \Carbon\Carbon::parse($idea->start_date)->format('d M Y') }}
                        </div>
                          <!-- Like / dislike -->
                        <div class="likeblock pull-right" style="font-size: 20px;">
                            @include('laravelLikeComment::like', ['like_item_id' => $idea->id])
                        </div>
                        <!-- Like / dislike -->
                        
                        @if($idea->topic->status != '3')


                        @endif
                      

                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
                

                <div class="paginationf">
                    <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa fa-comments"></i>Comments</a></div>
                    <div class="pull-left">
                       
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                
                @foreach($comments as $comment)

                @if(checkPermission(['student']))

                @if($comment->user->user_role == '5')
                <!-- Comment -->
                <div class="post">
                    <div class="topwrap">
                        <div class="comment-logo userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/comment.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext idea-text pull-left">
                            <p>
                                {{ $comment->description }}
                                @if(\Auth::user()->id == $comment->user_id)
                                    <span class="pull-right">
                                        <a href="{{ route('EditComment', [$idea->id, $comment->id]) }}"><strong>Edit</strong></a>
                                    </span>
                                @endif
                            </h2>
                            <p>
                        </div>

                        <div class="clearfix"></div>
                   
                    </div>                              
                    <div class="postinfobot">
                        <!-- comment author -->
                       <div class="posted pull-left">
                           <i class="fa fa-user-o"></i> {{ ucfirst($comment->name) }} &nbsp <i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}
                       </div>
                        <!-- comment author -->

                        <div class="clearfix"></div>
                    </div>

                    
                </div><!-- comment -->
                @endif

                @else

                <!-- Comment -->
                <div class="post">
                    <div class="topwrap">
                        <div class="comment-logo userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/comment.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext idea-text pull-left">
                            <p>
                                {{ $comment->description }}
                                @if(\Auth::user()->id == $comment->user_id)
                                    <span class="pull-right">
                                        <a href="{{ route('EditComment', [$idea->id, $comment->id]) }}"><strong>Edit</strong></a>
                                    </span>
                                @endif
                            </h2>
                            <p>
                        </div>

                        <div class="clearfix"></div>
                   
                    </div>                              
                    <div class="postinfobot">
                        <!-- comment author -->
                       <div class="posted pull-left">
                           <i class="fa fa-user-o"></i> {{ ucfirst($comment->name) }} &nbsp <i class="fa fa-clock-o"></i> {{ $comment->created_at->diffForHumans() }}
                       </div>
                        <!-- comment author -->

                        <div class="clearfix"></div>
                    </div>

                    
                </div><!-- comment -->
                
                @endif
                @endforeach

                {{ $comments->links() }}

                @if($idea->topic->status != '3')
                <!-- POST Idea -->
                <div class="post">
                    {!! Form::open(['route'=>['addComment',$idea->id],'class'=>'form-horizontal m-b-30','files' => true,'name'=>'storeCommentForm']) !!}
                        <div class="topwrap">
                            <div class="userinfo pull-left">
                                

                                <div class="icons-idea">
                                    <div class="postreply">Post a Comment</div>
                                </div>
                            </div>
                            <div class="posttext idea-text pull-left">
                                
                                <div class="form-group {{ $errors->has('comment_detail') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                        <textarea id="editor" name="comment_detail" class="form-control" placeholder="Type Your comment" 
                                        value="{{ old('comment_detail') }}" data-validation="length" data-validation-length="3-255" 
                                        data-validation-error-msg="Comment has to be an alphanumeric value (3-255 chars)"></textarea>
                                        @if ($errors->has('comment_detail'))
                                            <span class="text-danger help-block">
                                                <block>{{ $errors->first('comment_detail') }}</block>
                                            </span>
                                        @endif  
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('comment_detail') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                        <label for="postas" class="form-lbl">Post As: </label>
                                        <div class="radio-inline">
                                          <label><input type="radio" checked name="postas" value="realuser">Real user</label>
                                        </div>
                                        <div class="radio-inline">
                                          <label><input type="radio" name="postas" value="anynomous">Anonymous</label>
                                        </div>  
                                    </div>
                                </div>
                                
                            </div>

                            <div class="clearfix"></div>
                        </div>                              
                        <div class="postinfobot">

                            <div class="pull-left">
                                <input type="checkbox" name="agree" data-validation="required" data-validation-error-msg="You have to agree to our terms" id="note" >
                                <label for="note" class="form-lbl"> I agree to the <a href="{{ route('terms') }}">Terms and Conditions</a></label>
                            </div>

                            <div class="pull-right postreply">
                               
                                <div class="pull-left"><a href="{{ URL::previous() }}" class="btn btn-info">Back</a> &nbsp <button type="submit" class="btn btn-primary">Add Comment</button></div>
                                
                                <div class="clearfix"></div>
                            </div>

                         
                            <div class="clearfix"></div>
                        </div>
                    {{ Form::close() }}
                </div><!-- POST Idea-->
                @else
                    <div class="pull-left" style=" padding-bottom: 20px; ">
                        <a href="{{ URL::previous() }}" class="btn btn-danger" style="padding: 9px;">Topic is Closed, Can not post any idea</a>
                        <a href="{{ URL::previous() }}" class="btn btn-info" style="padding-bottom: 12px;">Back</a>
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

