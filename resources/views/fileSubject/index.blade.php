@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
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
                        <h4 class="media-heading"><b>File Subject</b></h4>
                        Manage
                    </div>
                </div>
            </div>
            @can('app.fileSubject.index')
            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.fileSubject.create')}}" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-plus-circle"></i>
                    File Subject Create
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
                                    <th class="text-center">Modify By</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">Modification Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fileSubjects as $kye=> $fileSubject)
                                    <tr>
                                        <td > # {{$kye + 1}}</td>
                                        <td class="text-center">{{$fileSubject->name}}</td>
                                        <td class="text-center">{{$fileSubject->user->name}}</td>

                                        <td  class="text-center">
                                            @if($fileSubject->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">InActive</span>
                                            @endif
                                        </td>

                                        <td  class="text-center">{{$fileSubject->updated_at->diffForHumans()}} </td>
                                        <td  class="text-center">
                                            <!-- @can('app.fileSubject.index')
                                                <a href="{{route('app.fileSubject.show',$fileSubject->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-eye"></i> Show
                                                </a>
                                            @endcan -->
                                            @can('app.offices.edit')
                                                <a href="{{route('app.fileSubject.edit',$fileSubject->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            @endcan

                                            @can('app.offices.destroy')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{$fileSubject->id}})">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            @endcan
                                                <form id="delete-form-{{$fileSubject->id}}" method="POST" action="{{route('app.fileSubject.destroy',$fileSubject->id)}}" style="display: none">
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

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });

    </script>


@endpush
