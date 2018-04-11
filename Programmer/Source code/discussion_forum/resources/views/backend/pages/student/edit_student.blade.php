@extends ('backend.layouts.master')

@section('page_title','Edit Student Information')

@section('main_content')

<div class="block-header">
    <h2>Edit Student Information</h2>
</div>


<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Student Information Form
                </h2>
                
            </div>
            <div class="body">
                {!! Form::open(['route'=>['studentUpdate', $user->id],'class'=>'form-horizontal','files' => true]) !!}
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="first name" 
                                    value="{{ $user->student->first_name }}" data-validation="required" >
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger help-block">
                                            <block>{{ $errors->first('first_name') }}</block>
                                        </span>
                                    @endif  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Last name">Last Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="first name" 
                                    value="{{ $user->student->last_name }}" data-validation="required" >
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger help-block">
                                            <block>{{ $errors->first('last_name') }}</block>
                                        </span>
                                    @endif  
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="email" name="email" value="{{ $user->email }}" placeholder="E-Mail" id="input-email" class="form-control" data-validation="email"/>
                                    @if ($errors->has('email'))
                                      <span class="help-block">
                                          <block>{{ $errors->first('email') }}</block>
                                      </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="text" name="phone" value="{{ $user->student->phone }}" placeholder="Phone Number" id="input-telephone" class="form-control" data-validation="length number" data-validation-length="max11"/>
                                    @if ($errors->has('phone'))
                                      <span class="help-block">
                                          <block>{{ $errors->first('phone') }}</block>
                                      </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Gender">Gender</label>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                            <input type="radio" name="gender" data-validation="required" id="male" value="male" class="with-gap">
                            <label for="male">Male</label>

                            <input type="radio" name="gender" data-validation="required" id="female" value="female" class="with-gap">
                            <label for="female" class="m-l-20">Female</label>
                            @if ($errors->has('gender'))
                              <span class="help-block">
                                  <block>{{ $errors->first('gender') }}</block>
                              </span>
                            @endif
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Department Name">Department Name</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            
                            {!! Form::select('department',$departments,$user->student->dep_id,['class'=>'form-control show-tick','required','id'=>'department','data-live-search' => 'true','placeholder'=>'Please select department','name'=>'department','data-validation'=>'required']) !!}
                            
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="status">User Status</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            
                            {!! Form::select('status',['1'=>'Active','0'=>'Deactive'],$user->user_status,['class'=>'form-control show-tick','required','id'=>'status','name'=>'status','placeholder'=>'Please select Status','data-validation'=>'required']) !!}
                            
                        </div>
                    </div>
                    
                    
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
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

    <script>
        var radio_checked = '{{ $user->student->gender }}';

        $(document).ready(function() { // start this when site is fully loaded
            if (radio_checked) { // check if variable is empty or not
                $(':radio[value='+radio_checked+']').prop('checked', true);
            }
        });
    </script>
    
@endsection