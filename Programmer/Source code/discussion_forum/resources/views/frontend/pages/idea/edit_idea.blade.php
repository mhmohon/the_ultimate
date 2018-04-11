@extends ('frontend.layouts.master')

@section('page_title', 'Edit Idea')

@section('extra_css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
 
    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('main_content')

	<div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="{{ route('home') }}">UOG Forum</a> <span class="diviver">&gt;</span> <a href="{{ URL::previous() }}">Topic Details</a> <span class="diviver">&gt;</span> <a>Edit Idea</a>
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
                                <img src="{{ asset('photos/icon/topic.png') }}" alt="" />
                            </div>
   
                        </div>
                        <div class="posttext pull-left">
                            <h2>{{ $topic->title }}</h2>
                            <p>{{ $topic->description }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="posted pull-left"><i class="fa fa-clock-o"></i>  Posted {{ \Carbon\Carbon::parse($topic->start_date)->diffForHumans() }}</div>


                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
				
				 <!-- POST Idea -->
	            <div class="post">
	                {!! Form::open(['route'=>['updateIdea',$topic->id,$idea->id],'class'=>'form-horizontal m-b-30','files' => true,'name'=>'storeIdeaForm']) !!}
	                    <div class="topwrap">
	                        <div class="userinfo pull-left">
	                            

	                            <div class="icons-idea">
	                                <div class="postreply">Post a Idea</div>
	                            </div>
	                        </div>
	                        <div class="posttext idea-text pull-left">
	                            
	                            <div class="form-group {{ $errors->has('idea_title') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <input type="text" id="idea_title" name="idea_title" class="form-control" placeholder="Type Idea title" 
	                                    value="{{ $idea->title }}" data-validation="length" data-validation-length="3-255" 
	                                    data-validation-error-msg="Topic name has to be an alphanumeric value (3-255 chars)">
	                                    @if ($errors->has('idea_title'))
	                                        <span class="text-danger help-block">
	                                            <block>{{ $errors->first('idea_title') }}</block>
	                                        </span>
	                                    @endif  
	                                </div>
	                            </div>
	                            <div class="form-group {{ $errors->has('idea_detail') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <textarea id="editor" name="idea_detail" class="form-control" placeholder="Type Idea Details" 
	                                     data-validation="length" data-validation-length="3-255" 
	                                    data-validation-error-msg="Topic name has to be an alphanumeric value (3-255 chars)">{{ $idea->description }}</textarea>
	                                    @if ($errors->has('idea_detail'))
	                                        <span class="text-danger help-block">
	                                            <block>{{ $errors->first('idea_detail') }}</block>
	                                        </span>
	                                    @endif  
	                                </div>
	                            </div>
	                            <div class="form-group {{ $errors->has('idea_detail') ? ' has-error' : '' }}">
	                                <div class="form-line">
	                                    <label for="postas" class="form-lbl">Post As: </label>
	                                    <div class="radio-inline">
	                                      <label><input type="radio" checked name="postas" value="realuser">Real user</label>
	                                    </div>
	                                    <div class="radio-inline">
	                                      <label><input type="radio" name="postas" value="anynomous">Anynomous</label>
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
	                            
	                            <div class="pull-left"><a href="{{ URL::previous() }}" class="btn btn-info">Back</a> &nbsp <button type="submit" class="btn btn-primary">Update Idea</button></div>
	                            <div class="clearfix"></div>
	                        </div>


	                        <div class="clearfix"></div>
	                    </div>
	                {{ Form::close() }}
	            </div><!-- POST Idea-->
         
            </div>
           
            
        </div>
    </div>
           
@endsection

@section('extra_js')

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.5/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> 
        $(function() { 
            $('#editor').froalaEditor({
            	heightMin: 300,
      			heightMax: 500,

                toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', '|', 'fontFamily', 'color', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|', 'emoticons', 'specialCharacters', 'insertHR', '|', 'spellChecker', 'html', '|', 'undo', 'redo']
            });

        }); 
    </script>
    
@endsection