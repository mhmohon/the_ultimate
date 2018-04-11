@extends ('backend.layouts.master')

@section('page_title',$title)

@section('extra_css')
    <!-- Bootstrap datatable Css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" />
@endsection
@section('main_content')

<div class="block-header">
    <h2>{{ $title }}</h2>
</div>


<!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Idea List
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Posted as</th>
                                    <th>Real Name</th>
                                    <th>Posted date</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    @if(checkPermission(['admin','qam']))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($ideas as $key => $idea)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    @php
                                        $length = 30;
                                        $title = substr($idea->title, 0, $length);
                                        $title .= '...';
                                    @endphp
                                    <td>{{ $title }}</td>
                                    <td>{{ ucfirst($idea->name) }}</td>
                                    
                                    <td>{{ $idea->user->student->first_name. " " . $idea->user->student->last_name }}</td>
                                    
                                    <td style='width: 13%'>{{ \Carbon\Carbon::parse($idea->created_at)->format('d M Y') }}</td>
                                    <td>{{ $idea->view }}</td>
                                    @if( $idea->status == 0)
                                        <td class="text-center">
                                            <span class="label label-warning"> Unpublished</span>
                                        </td>
                                    @elseif($idea->status == 1)
                                        <td class="text-center">
                                            <span class="label label-success"> Published</span>
                                        </td>
                                    
                                    @endif
                                    @if(checkPermission(['admin','qam']))
                                    <td style='width: 15%'>
                                            
                                        <a href="{{ route('ideaShow',$idea->id) }}" class="btn btn-sm btn-info"><i class="material-icons">remove_red_eye</i></a>
                                        <a href="{{ route('editIdea',$idea->id) }}" class="btn btn-sm btn-warning"><i class="material-icons">mode_edit</i></a>
                                        
                                        @if($idea->topic->end_date <= \Carbon\Carbon::now()->toDateString())
                                            <a href="{{ route('downloadPDF',$idea->id) }}" class="btn btn-sm btn-primary"><i class="material-icons">file_download</i></a>
                                            @else
                                            <a disabled href="{{ route('downloadPDF',$idea->id) }}" class="btn btn-sm btn-primary"><i class="material-icons">file_download</i></a>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

@endsection

@section('extra_js')

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/backend/plugins/bootstrap-datatable/jquery.dataTables.js') }} "></script>
    <script src="{{ asset('js/backend/plugins/bootstrap-datatable/dataTables.bootstrap.js') }} "></script>
   
    
    <script>
        $(document).ready(function() {
            $('.js-basic-example').DataTable( {
                "dom": '<"toolbar">frtip'
            } );
         
            
        });
    </script>
        
	
@endsection