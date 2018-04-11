@extends ('backend.layouts.master')

@section('page_title',$title)

@section('extra_css')
    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('css/backend/plugins/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />
@endsection
@section('main_content')

<div class="block-header">
    <h2>{{ $title }}</h2>
</div>


<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Comment Edit Form
                </h2>
                
            </div>
            <div class="body">
            	{!! Form::open(['route'=>['CommentUpdate',$comment->id],'class'=>'form-horizontal','files' => true]) !!}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="topic_title">Description</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('comment_title') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="comment_title" name="comment_description" class="form-control" 
                                    value="{{ $comment->description }}" disabled="disabled">
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="status">Publication Status</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            
                            {!! Form::select('status',['1'=>'Active','0'=>'Deactive'],$comment->status,['class'=>'form-control show-tick','required','name'=>'status','id'=>'status','placeholder'=>'Please select Status','data-validation'=>'required']) !!}
                            
                        </div>
                    </div>
					
				
					
                    
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Comment</button>
                            <a href="{{ URL::previous() }}" class="btn btn-info m-t-15 waves-effect">Back</a>
                            
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->

@endsection

@section('extra_js')

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/backend/plugins/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js') }} "></script>

    <script>
        $('#final_date').bootstrapMaterialDatePicker({ weekStart : 0, time : false, format : 'DD MMMM YYYY ', minDate : new Date(), clearButton : true });

        $('#start_date').bootstrapMaterialDatePicker({ weekStart : 0, time : false, format : 'DD MMMM YYYY ', minDate : new Date(), clearButton : true }).on('change', function(e, date)
        {
            $('#closure_date').bootstrapMaterialDatePicker('setMinDate', date);
        });

        $('#closure_date').bootstrapMaterialDatePicker({ weekStart : 0, time : false, format : 'DD MMMM YYYY ', minDate : new Date(), clearButton : true }).on('change', function(e, date)
        {
            $('#final_date').bootstrapMaterialDatePicker('setMinDate', date);
        });
    </script>
	
@endsection