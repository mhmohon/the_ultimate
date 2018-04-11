<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('dashboardHome') }}">UOG Discussion Forum</a>
        </div>
        @if(checkPermission(['admin']))
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        @if(auth()->user()->unreadNotifications->count())
                        <span class="label-count">{{ \Auth::user()->unreadNotifications->count() }}</span>

                        @endif
                    </a>
                    <ul class="dropdown-menu" style=" min-width: 315px; ">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                @if(auth()->user()->unreadNotifications->count())
                                @foreach(\Auth::user()->unreadNotifications as $notification)
                                <li style="background-color: #E5EAF2; border-bottom: 1px solid #c5ccd6";>
                                    <a href="{{ route('IdeaMarkRead',[$notification->data['idea']['id'],$notification->id]) }}">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>{{ $notification->data['idea']['name'] }} post a new Idea.</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @else
                                    <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>No New Notification.</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 0 mins ago
                                            </p>
                                        </div>
                                    </a>
                                    </li>
                                @endif

                                @if(auth()->user()->readNotifications->count())
                                @foreach(\Auth::user()->readNotifications as $notification)
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>{{ $notification->data['idea']['name'] }} post a new Idea.</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                
                                @endif
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{ route('markAsReadAll') }}">Mark All Read</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                
                
            </ul>
        </div>
        @endif
    </div>
</nav>
<!-- #Top Bar -->