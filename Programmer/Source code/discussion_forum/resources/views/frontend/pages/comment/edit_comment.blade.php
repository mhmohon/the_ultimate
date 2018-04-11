@extends ('frontend.layouts.master')

@section('page_title', 'Edit Comment')

@section('main_content')

	<div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ URL::previous() }}">Idea Details</a> <span class="diviver">&gt;</span> <a>Edit Comment</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">

                <!-- POST -->
                <div class="post beforepagination beforidea">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="{{ asset('photos/icon/idea.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left">
                            <h2>{{ $idea->title }}</h2>
                            <p>{!! $idea->description !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="posted pull-left"><i class="fa fa-clock-o"></i>  Posted {{ \Carbon\Carbon::parse($idea->start_date)->format('d M Y') }}</div>


                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
				
				 <!-- POST Comment -->
	            <div class="post">
	                {!! Form::open(['route'=>['updateComment',$idea->id,$comment->id],'class'=>'form-horizontal m-b-30','files' => true,'name'=>'storeCommentForm']) !!}
	                    <div class="topwrap">
	                        <div class="userinfo pull-left">
	                            

	                            <div class="icons-idea">
	                                <div class="postreply">Update comment</div>
	                            </div>
	                        </div>
	                        <div class="posttext idea-text pull-left">
	                            

	                            <div class="form-group {{ $errors->has('comment_detail') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <textarea id="editor" name="comment_detail" class="form-control" placeholder="Type Idea Details" 
	                                    data-validation="length" data-validation-length="3-255" 
	                                    data-validation-error-msg="Topic name has to be an alphanumeric value (3-255 chars)">{{ $comment->description }}</textarea>
	                                    @if ($errors->has('comment_detail'))
	                                        <span class="text-danger help-block">
	                                            <block>{{ $errors->first('comment_detail') }}</block>
	                                        </span>
	                                    @endif  
	                                </div>
	                            </div>
	                            <div class="form-group {{ $errors->has('comment_detail') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <label for="postas" class="form-lbl">Post As: </label>
	                                    <div class="radio-inline">
	                                      <label><input type="radio" checked name="postas" value="realuser">Real user</label>
	                                    </div>
	                                    <div class="radio-inline">
	                                      <label><input type="radio" name="postas" value="anynomous">Anonymous</label>
	                                    </div>  
	                                </div>
	                            </div>
	                            
	                        </div>

	                        <div class="clearfix"></div>
	                    </div>                              
	                    <div class="postinfobot">

	                        <div class="pull-left">
	                            <input type="checkbox" name="agree" data-validation="required" data-validation-error-msg="You have to agree to our terms" id="note" >
	                            <label for="note" class="form-lbl"> I agree to the <a href="">Terms and Conditions</a></label>
	                        </div>

	                        <div class="pull-right postreply">
	                            
	                            <div class="pull-left"><a href="{{ URL::previous() }}" class="btn btn-info">Back</a> &nbsp <button type="submit" class="btn btn-primary">Update Comment</button></div>
	                            <div class="clearfix"></div>
	                        </div>


	                        <div class="clearfix"></div>
	                    </div>
	                {{ Form::close() }}
	            </div><!-- POST Comment-->
         
            </div>
           
            
        </div>
    </div>
           
@endsection
