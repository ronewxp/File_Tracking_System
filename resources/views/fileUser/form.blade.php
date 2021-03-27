@extends('layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
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

                        <i class="fa fa-briefcase fa-3x text-info"></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><b>File User</b></h4>
                        @if(isset($fileUser))
                            Update
                        @else
                            Create
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.fileUser.index')}}" class="btn btn-lg btn-block btn-danger">
                    <i class="fa fa-arrow-circle-left"></i>
                    Back
                </a>
            </div>

        </div>
        <!-- /.row -->
        </br>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <form action="{{isset($fileUser) ? route('app.fileUser.update',$fileUser->id) : route('app.fileUser.store')}}" method="POST" >
                @csrf
                @if(isset($fileUser))
                    @method('PUT')
                @endif
                <!-- TABLE: LATEST ORDERS -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">File User Info</div>
                                <div class="panel-body">

                                    <label for="role">Select User</label>
                                    <div class="form-group has-feedback{{ $errors->has('user') ? ' has-error' : '' }}">
                                        <select class="js-example-basic-single form-control" name="user" required>
                                            <option></option>
                                            @foreach($users as $key=> $user)
                                                <option value="{{$user->id}}" @isset($fileUser){{$fileUser->user->id ==$user->id ? 'selected':''}} @endisset>{{$user->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('user'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('user') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="role">Select Office</label>
                                    <div class="form-group has-feedback{{ $errors->has('office') ? ' has-error' : '' }}">
                                        <select class="js-example-basic-single form-control" name="office" required>
                                            <option></option>
                                            @foreach($offices as $key=> $office)
                                                <option value="{{$office->id}}" @isset($fileUser){{$fileUser->office->id ==$office->id ? 'selected':''}} @endisset>{{$office->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('office'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('office') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="status">File Manager</label>
                                    <div class="form-group has-feedback{{ $errors->has('is_file_manager') ? ' has-error' : '' }}">
                                        <label class="switch">
                                            <input type="checkbox" name="is_file_manager" id="is_file_manager" @isset($fileUser){{ $fileUser->is_file_manager ==true ? 'checked':'' }} @endisset>
                                            <span class="slider round"></span>
                                        </label>

                                        @if ($errors->has('is_file_manager'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('is_file_manager') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="status">Receive Comments</label>
                                    <div class="form-group has-feedback{{ $errors->has('is_receive_comments') ? ' has-error' : '' }}">
                                        <label class="switch">
                                            <input type="checkbox" name="is_receive_comments" id="is_receive_comments" @isset($fileUser){{ $fileUser->is_receive_comments ==true ? 'checked':'' }} @endisset>
                                            <span class="slider round"></span>
                                        </label>

                                        @if ($errors->has('is_receive_comments'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('is_receive_comments') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                 
                                    <label for="status">Status</label>
                                    <div class="form-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="switch">
                                            <input type="checkbox" name="status" checked id="status" @isset($fileUser){{ $fileUser->status ==true ? 'checked':'' }} @endisset>
                                            <span class="slider round"></span>
                                        </label>

                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-info btn-lg">
                                        @if(isset($fileUser))
                                            <i class="fa fa-arrow-circle-up"></i>
                                            File User Update
                                        @else
                                            <i class="fa fa-plus-circle"></i>
                                            File User Create
                                        @endif
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                <!-- /.box -->
                </form>
            </div>
            <!-- /.col -->


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Select Item",
                allowClear: true
            });


        });

    </script>


@endpush
