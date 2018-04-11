<div class="headernav" style="background-color: #18BC9C;">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo " style=" padding-top: 5px;  "><a href="{{ route('home') }}"><img style=" border-radius: 40%;width: 60px;" src="photos/logo.png" alt=""  /></a></div>
            <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                <div class="dropdown">
                    <a href="{{ route('home') }}" style=" color: #fff; ">UOG Forum</a> 
                   
                </div>
            </div>
            <div class="col-lg-4 search col-xs-12 col-md-3">
                <div class="wrap">
                    <form action="{{ route('topicSearch') }}" method="post" class="form">
                        @csrf
                        <div class="pull-left txt">
                            <input type="text" class="form-control" value="{{ isset($input) ? $input : '' }}" name="search_value" placeholder="Search Topics" >
                        </div>
                        <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt mobile-avatar">

                <div class="avatar pull-right dropdown">
                    <a data-toggle="dropdown" href="#"><img src="{{ asset('photos/icon/avatar.png') }}" alt="" /></a> <b class="caret"></b>
                    
                    <ul class="dropdown-menu divider" role="menu">

                        @if(checkPermission(['admin','qac','qam','staff']))

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ Auth::user()->staff->first_name . ' ' . Auth::user()->staff->last_name }}</a></li>
                        <div class="divline"></div>
                        @else
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">{{ Auth::user()->student->first_name . ' ' . Auth::user()->student->last_name }}</a></li>
                        @endif
                        
                        @if(checkPermission(['admin','qac','qam']))
                        
                        <li role="presentation"><a href="{{ route('dashboardHome') }}" role="menuitem" tabindex="-2" >Go to dashboard</a></li>

                        @else
                        <li role="presentation"><a href="{{ route('myDashboardShow') }}" role="menuitem" tabindex="-2">My dashboard</a></li>
                        @endif

                        <div class="divline"></div>
                        @if(checkPermission(['admin','qac','qam']))
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('dashboardProfile') }}">My Profile</a></li>
                        @endif
                        <li role="presentation"><a role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" tabindex="-3">Log Out</a></li>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>