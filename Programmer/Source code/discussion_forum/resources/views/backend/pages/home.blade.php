@extends ('backend.layouts.master')

@section('page_title','Admin Dashboard')

@section('extra_css')
    <!-- For Reports -->
    {!! Charts::styles() !!}
@endsection

@section('main_content')
   
    <div class="block-header">
        @if(\Auth::user()->user_role == '1')
            <h1 style=" font-size: 25px; ">Welcome <span class="font-bold col-pink">Administrator</span></h1>
        @elseif(\Auth::user()->user_role == '2')
            <h1 style=" font-size: 25px; ">Welcome <span class="font-bold col-pink">Quality Assurance Manager</span></h1>
        @else
            <h1 style=" font-size: 25px; ">Welcome <span class="font-bold col-pink">Quality Assurance Coordinator</span></h1>
        @endif
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL TOPIC</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">{{ \App\Topic::all()->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL IDEA</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">{{ \App\Idea::all()->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL COMMENTS</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">{{ \App\Comment::all()->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL VISITORS</div>
                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">{{ \App\User::where('user_status', 1)->get()->count() }}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Total Idea Post</h2>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="body">
                    
                        {!! $chart->html() !!}
                    
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
   

@endsection

@section('extra_js')

    <!-- For Reports -->
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    
@endsection