@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
@endpush
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        </br>
        <div class="row">
            <div class="col-md-3 ">
                <div class="media">
                    <div class="media-left media-middle">

                        <i class="fa fa-users fa-3x text-info"></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><b>Office</b></h4>
                        Management
                    </div>
                </div>
            </div>
            @can('app.offices.index')
            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.offices.create')}}" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-plus-circle"></i>
                    Office Create
                </a>
            </div>
            @endcan
        </div>
        <!-- /.row -->
        </br>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table no-margin">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Modify By</th>
                                    <th class="text-center">Is Starting Office</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">Modification Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offices as $kye=> $office)
                                    <tr>
                                        <td > # {{$kye + 1}}</td>
                                        <td class="text-center">{{$office->name}}</td>
                                        <td class="text-center">{{$office->code}}</td>
                                        <td class="text-center">{{$office->mobile}}</td>
                                        <td class="text-center">{{$office->user->name}}</td>

                                        <td  class="text-center">
                                            @if($office->is_starting_office)
                                                <span class="label label-success">Yes</span>
                                            @else
                                                <span class="label label-danger">No</span>
                                            @endif
                                        </td>

                                        <td  class="text-center">
                                            @if($office->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">InActive</span>
                                            @endif
                                        </td>

                                        <td  class="text-center">{{$office->created_at->diffForHumans()}} </td>
                                        <td  class="text-center">
                                            <!-- @can('app.offices.index')
                                                <a href="{{route('app.offices.show',$office->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-eye"></i> Show
                                                </a>
                                            @endcan -->
                                            @can('app.offices.edit')
                                                <a href="{{route('app.offices.edit',$office->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            @endcan

                                            @can('app.offices.destroy')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{$office->id}})">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            @endcan
                                                <form id="delete-form-{{$office->id}}" method="POST" action="{{route('app.offices.destroy',$office->id)}}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>


@endpush
