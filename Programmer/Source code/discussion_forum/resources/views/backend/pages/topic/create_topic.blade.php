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
                    Topic Form
                </h2>
                
            </div>
            <div class="body">
            	{!! Form::open(['route'=>'storeTopic','class'=>'form-horizontal','files' => true]) !!}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="topic_title">Topic Title</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('topic_title') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="topic_title" name="topic_title" class="form-control" placeholder="Type topic title" 
                                    value="{{ old('topic_title') }}" data-validation="length" data-validation-length="3-255" 
                                    data-validation-error-msg="Topic name has to be an alphanumeric value (3-255 chars)">
                                    @if ($errors->has('topic_title'))
                                        <span class="text-danger help-block">
                                            <block>{{ $errors->first('topic_title') }}</block>
                                        </span>
                                    @endif  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="topic_des">Description</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group form-float {{ $errors->has('topic_des') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <textarea rows="2" class="form-control no-resize" id="topic_des" name="topic_des" class="form-control" placeholder="Type topic description" 
                                    data-validation="required">{{ old('topic_des') }}</textarea>
                                    @if ($errors->has('topic_des'))
                                        <span class="text-danger help-block">
                                            <block>{{ $errors->first('topic_des') }}</block>
                                        </span>
                                    @endif  
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="start_date">Start Date</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="start_date" name="start_date" class="datepicker form-control" placeholder="Please choose a date" value="{{ old('start_date') }}" data-validation="required">
                                    @if ($errors->has('start_date'))
                                      <span class="help-block">
                                          <block>{{ $errors->first('start_date') }}</block>
                                      </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="closure_date">Closure Date</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('closure_date') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="closure_date" name="closure_date" class="datepicker form-control" placeholder="Please choose a date" value="{{ old('closure_date') }}" data-validation="required">
                                    @if ($errors->has('closure_date'))
                                      <span class="help-block">
                                          <block>{{ $errors->first('closure_date') }}</block>
                                      </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
					
					
					<div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="final_date">Final Closure Date</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('final_date') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="final_date" class="datepicker form-control" name="final_date" placeholder="Please choose a date" value="{{ old('final_date') }}" data-validation="required">
                                    @if ($errors->has('final_date'))
                                      <span class="help-block">
                                          <block>{{ $errors->first('final_date') }}</block>
                                      </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    


                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="status">Publication Status</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            
                            {!! Form::select('status',['1'=>'Active','0'=>'Deactive'],0,['class'=>'form-control show-tick','required','id'=>'status','placeholder'=>'Please select Status','data-validation'=>'required']) !!}
                            
                        </div>
                    </div>
					
				
					
                    
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Topic</button>
                            
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