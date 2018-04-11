@extends ('frontend.layouts.master')

@section('page_title', 'All Topics')
@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12 col-md-8">
                <div class="pull-left">
                	<h3>
                		All Topics
                	</h3>
            	</div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                @if($latestTopics->count())
                @foreach($latestTopics as $topic)
                <!-- POST -->
                <div class="post">
                    <div class="wrap-ut pull-left">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/topic.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left">
                            <h2><a href="{{ route('topicShow', $topic->id) }}">{{ $topic->title }}</a></h2>
                            @php
                                $length = 50;
                                $description = substr($topic->description, 0, $length);
                                $description .= '...';
                            @endphp
                            <p>{{ $description }}</p>
                            <div class="posted pull-left" style="padding-right: 10px">
                                <i class="fa fa-clock-o"></i> Posted on : {{ \Carbon\Carbon::parse($topic->start_date)->format('d M Y') }}
                            </div>

                            @if($topic->status == '3')
                                
                                <div class="posted pull-left">
                                    <i class="fa fa-clock-o"></i> Closing time: <span style="color: #ff6743">Closed</span>
                                </div>
                            @else
                                <div class="posted pull-left">
                                    <i class="fa fa-clock-o"></i> Closing time: {{ \Carbon\Carbon::parse($topic->end_date)->diffForHumans() }}
                                </div>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="postinfo pull-left">
                        <div class="comments">
                            @php
                                
                                $ideaCount = \App\Idea::where('topic_id', $topic->id)
                                    ->where('status', 1)
                                    ->get();
 
                            @endphp
                            
                            <div class="commentbg">
                                {{ number_format($ideaCount->count()) }}
                                <div class="mark"></div>
                            </div>

                        </div>
                        <div class="views"><i class="fa fa-eye"></i> {{ number_format($topic->view) }}</div>
                        <div class="time"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($topic->start_date)->diffForHumans() }}</div>                                    
                    </div>
                    <div class="clearfix"></div>
                </div><!-- POST -->

                @endforeach
                @else
                    <h2>No Topics</h2>
                @endif
            </div>
            
                <!-- Left Sidebar -->
                @include ('frontend.layouts.right_sidebar')
        
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                
                <div class="pull-left">
                    {{ $latestTopics->links() }}
                </div>
                
            </div>
        </div>
    </div>
@endsection