@extends ('frontend.layouts.master')

@section('page_title', 'View Comment')
@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a>View Comment</a>
            </div>
        </div>
    </div>
   

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
               
                @foreach($comments as $comment)

               
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
                

                @endforeach

                {{ $comments->links() }}

            </div>
           
            <!-- Left Sidebar -->
            @include ('frontend.layouts.right_sidebar')
        </div>
    </div>

    
@endsection

@section('extra_js')

    
    <script>
        var x = document.URL;
        document.getElementById("input-sort").value = x;
    </script>
@endsection