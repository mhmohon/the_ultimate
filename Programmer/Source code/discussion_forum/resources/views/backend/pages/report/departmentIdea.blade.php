@extends ('backend.layouts.master')

@section('page_title','Dashboard | Reports')

@section('extra_css')
    <!-- For Reports -->
    {!! Charts::styles() !!}
@endsection

@section('main_content')

    <!-- Reports -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Number of Idea</h2>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="body">
                    
                        {!! $numberOfIdea->html() !!}
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Percentage of Idea</h2>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="body">
                    
                        {!! $percentageOfIdea->html() !!}
                    
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
   

@endsection

@section('extra_js')

    <!-- For Reports -->
    {!! Charts::scripts() !!}
    {!! $numberOfIdea->script() !!}
    {!! $percentageOfIdea->script() !!}
    
@endsection