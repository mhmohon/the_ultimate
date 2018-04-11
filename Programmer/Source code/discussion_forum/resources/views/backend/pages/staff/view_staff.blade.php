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
                        Staff List
                    </h2>
                    
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    @if(checkPermission(['admin','qam']))
                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($staffs as $key => $staff)
                                <tr>
                                    <td>{{ ($key+1) }}</td>
                                    <td>
                                        {{ $staff->first_name .' '. $staff->last_name }}
                                    </td>
                                    <td>{{ $staff->user->email }}</td>
                                    <td>{{ $staff->gender }}</td>
                                    <td>{{ $staff->phone }}</td>
                                    @if( $staff->user->user_status == 0)
                                        <td class="text-center">
                                            <span class="label label-warning"> Deactive</span>
                                        </td>
                                    @elseif($staff->user->user_status == 1)
                                        <td class="text-center">
                                            <span class="label label-success"> Active</span>
                                        </td>
                                    
                                    @endif
                                    
                                    <td style='width: 12%'>
                                            
                                        <a href="{{ route('editStaff',$staff->user->id) }}" class="btn btn-sm btn-warning"><i class="material-icons">mode_edit</i></a>
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