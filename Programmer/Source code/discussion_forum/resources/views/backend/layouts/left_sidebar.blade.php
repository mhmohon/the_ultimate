
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('photos/backend/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            @auth
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->staff->first_name . ' ' . Auth::user()->staff->last_name }}
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ route('dashboardProfile') }}"><i class="material-icons">person</i>Profile</a></li>
                    
                    <li role="seperator" class="divider"></li>
                    <li><a
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>Sign Out</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
            @endauth
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="{!! (Request::url() == route('dashboardHome')) ? 'active' : '' !!}">
                <a href="{{ route('dashboardHome') }}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>
            <li class="{!! (Request::url() == route('home')) ? 'active' : '' !!}">
                <a href="{{ route('home') }}">
                    <i class="material-icons">receipt</i>
                    <span>View Forum</span>
                </a>
            </li>
            <li class="header">USER SECTION</li>
            
            
            <li class="{!! Request::url() == route('viewStaff') || Request::url() == route('editStaff', '4') ? 'active' : '' !!}">
            
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">supervisor_account</i>
                    <span>Staffs</span>
                </a>
                <ul class="ml-menu">
                    
                    <li class="{!! (Request::url() == route('viewStaff')) ? 'active' : '' !!}">
                        <a href="{{ route('viewStaff') }}">
                            <span>View All Staff</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </li>

            <li class="{!! Request::url() == route('viewStudent') || Request::url() == route('editStudent', '1') ? 'active' : '' !!}">
            
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">supervisor_account</i>
                    <span>Students</span>
                </a>
                <ul class="ml-menu">
                    
                    <li class="{!! (Request::url() == route('viewStudent')) ? 'active' : '' !!}">
                        <a href="{{ route('viewStudent') }}">
                            <span>View All Student</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </li>

            <li class="header">MAIN SECTION</li>
            <li class="active"></li>
            @if(! empty($topic))
            <li class="{!! (Request::url() == route('addTopic') || Request::url() == route('viewTopic') || Request::url() == route('editTopic', $topic->id)) ? 'active' : '' !!}">
            @else
            <li class="{!! (Request::url() == route('addTopic') || Request::url() == route('viewTopic')) ? 'active' : '' !!}">
            @endif
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">text_fields</i>
                    <span>Topics</span>
                </a>
                <ul class="ml-menu">
                    @if(checkPermission(['admin','qam']))
                    <li class="{!! (Request::url() == route('addTopic')) ? 'active' : '' !!}">
                        <a href="{{ route('addTopic') }}">
                            <span>Add New Topic</span>
                        </a>
                        
                    </li>
                    @endif
                    
                    <li class="{!! (Request::url() == route('viewTopic')) ? 'active' : '' !!}">
                        <a href="{{ route('viewTopic') }}">
                            <span>View All Topic</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </li>
            @if(! empty($idea))
            <li class="{!! Request::url() == route('viewIdea') || Request::url() == route('editIdea', $idea->id) ? 'active' : '' !!}">
            @else
            <li class="{!! Request::url() == route('viewIdea') ? 'active' : '' !!}">  
            @endif
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">assignment</i>
                    <span>Ideas</span>
                </a>
                <ul class="ml-menu">
                    
                    <li class="{!! (Request::url() == route('viewIdea')) ? 'active' : '' !!}">
                        <a href="{{ route('viewIdea') }}">
                            <span>View All Idea</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </li>
            
             @if(checkPermission(['admin','qam']))

            @if(! empty($comment))
            <li class="{!! Request::url() == route('viewComment') || Request::url() == route('editComment', $comment->id) ? 'active' : '' !!}">
            @else
            <li class="{!! Request::url() == route('viewComment') ? 'active' : '' !!}">  
            @endif
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">forum</i>
                    <span>Comments</span>
                </a>
                <ul class="ml-menu">
                    
                    <li class="{!! (Request::url() == route('viewComment')) ? 'active' : '' !!}">
                        <a href="{{ route('viewComment') }}">
                            <span>View All Comment</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </li>
            @endif

            @if(checkPermission(['admin','qam']))

            
            <li class="{!! Request::url() == route('reportIdeaDepartment') || Request::url() == route('anynomousIdea') || Request::url() == route('anynomousComment') || Request::url() == route('reportContributeDepartment') ? 'active' : '' !!}">
       
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">pie_chart</i>
                    <span>Reports</span>
                </a>
                <ul class="ml-menu">
                    <li class="{!! (Request::url() == route('reportIdeaDepartment')) ? 'active' : '' !!}">
                        <a href="{{ route('reportIdeaDepartment') }}">
                            <span>Department-wise Idea</span>
                        </a>
                        
                    </li>
                    
                    <li class="{!! (Request::url() == route('reportContributeDepartment')) ? 'active' : '' !!}">
                        <a href="{{ route('reportContributeDepartment') }}">
                            <span>Department-wise Contributors</span>
                        </a>
                        
                    </li>
                    <li class="{!! (Request::url() == route('anynomousIdea')) ? 'active' : '' !!}">
                        <a href="{{ route('anynomousIdea') }}">
                            <span>Anonymous Ideas</span>
                        </a>
                        
                    </li>
                    <li class="{!! (Request::url() == route('anynomousComment')) ? 'active' : '' !!}">
                        <a href="{{ route('anynomousComment') }}">
                            <span>Anonymous Comments</span>
                        </a>
                        
                    </li>
                    
                </ul>
            </li>
            @endif

            <li class="{!! (Request::url() == route('dashboardProfile')) ? 'active' : '' !!}">
                <a href="{{ route('dashboardProfile') }}">
                    <i class="material-icons">person</i>
                    <span>My Profile</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2018 <a href="javascript:void(0);">UOG - Online Forum</a>.
        </div>
        
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
