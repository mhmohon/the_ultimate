<div class="col-lg-4 col-md-4">

    @if(checkPermission(['qac','qam','staff','admin']))
    <div class="sidebarblock">
       
        <select id="input-sort" class="text-right form-control display_sort" onchange="location = this.value;">
                <option value="{{ route('home')}}">Default</option>
                <option value="{{ route('mostIdeaPopular')}}">Most Popular Ideas</option>
                <option value="{{ url('/forum/all-idea/view/sort_by=view&order=DESC')}}">Most Viewed Ideas</option>
                <option value="{{ route('latestIdea')}}">Latest Ideas</option>
                <option value="{{ route('latestComment')}}">Latest Comments</option>
    
            </select>
                
    </div>
    @endif
    <!-- Up Coming -->
    <div class="sidebarblock">
        <h3>Up Coming Topics </h3>
        <div class="divline"></div>
        @if($commingTopics->count())
            @foreach($commingTopics as $topic)
                <div class="blocktxt">
                    <a href="{{ route('topicShow',$topic->id) }}" class="pull-left">{{ $topic->title }}</a><br>
                     <div class="posted pull-left">
                        <i class="fa fa-clock-o"></i> Opening time: {{ \Carbon\Carbon::parse($topic->start_date)->diffForHumans() }}
                    </div>
                </div>
                <div class="divline"></div>
            @endforeach
        @else
            <div class="blocktxt">
                <a href="#" class="pull-left">No new topic is comming.</a><br>
                 
            </div>
        @endif
        
    </div>

    @if(checkPermission(['student']))
        @if($activeTopics->count())

           <div class="sidebarblock">
                <h3>My Active Topics</h3>
                <div class="divline"></div>
            @foreach($activeTopics as $activeTopic)
                <div class="blocktxt">
                    <a href="{{ route('topicShow',$activeTopic->id) }}">{{ $activeTopic->title }}</a>
                </div>
            @endforeach
            </div>

        @else
            <div class="sidebarblock">
                <h3>My Active Topics</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <p>You has not posted any idea yet.</p>
                </div>
            </div>
        @endif
    @endif

    @if(checkPermission(['qac','qam','staff']))

        @if($activeIdeas->count())

           <div class="sidebarblock">
                <h3>My Latest Replies</h3>
                <div class="divline"></div>
            @foreach($activeIdeas as $activeIdea)
                <div class="blocktxt">
                    <a href="{{ route('ideaShow',$activeIdea->id) }}">{{ $activeIdea->title }}</a>
                </div>
            @endforeach
            </div>
        @else
            <div class="sidebarblock">
                <h3>My Latest Replies</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <p>You has not posted any comment yet.</p>
                </div>
            </div>
        @endif

    @endif
    
</div>