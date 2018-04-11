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
                        Comment List
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Description</th>
                                    <th>Posted as</th>
                                    <th>Real Name</th>
                                    <th>Posted date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($comments as $key => $comment)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    @php
                                        $length = 15;
                                        $description = substr($comment->description, 0, $length);
                                        $description .= '...';
                                    @endphp
                                    <td>{{ $description }}</td>
                                    <td>{{ $comment->name }}</td>
                                    @if($comment->user->user_role == '5')
                                        <td>{{ $comment->user->student->first_name. " " . $comment->user->student->last_name }}</td>
                                    @else
                                        <td>{{ $comment->user->staff->first_name. " " . $comment->user->staff->last_name }}</td>
                                    @endif
                                    <td>{{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y') }}</td>
                                    
                                    @if( $comment->status == 0)
                                        <td class="text-center">
                                            <span class="label label-warning"> Unpublished</span>
                                        </td>
                                    @elseif($comment->status == 1)
                                        <td class="text-center">
                                            <span class="label label-success"> Published</span>
                                        </td>
                                    
                                    @endif
                                    <td style='width: 12%'>
                                            
                                        <a href="{{ route('editComment',$comment->id) }}" class="btn btn-sm btn-warning"><i class="material-icons">mode_edit</i></a>
                                    </td>
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
    <script src="{{ asset('js/backend/plugins/bootstrap-datatable/jquery-datatable.js') }} "></script>
	
@endsection