@extends('layouts.app')
@push('css')
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" /> -->
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
                        <h4 class="media-heading"><b>Office</b></h4>
                        @if(isset($office))
                            Update
                        @else
                            Create
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.offices.index')}}" class="btn btn-lg btn-block btn-danger">
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
                <form action="{{isset($office) ? route('app.offices.update',$office->id) : route('app.offices.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($office))
                    @method('PUT')
                @endif
                <!-- TABLE: LATEST ORDERS -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Office Info</div>
                                <div class="panel-body">
                                    <label for="name">Name</label>
                                    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input type="text" class="form-control" name="name" value="{{ $office->name ?? old('name') }}" placeholder="Name" required >

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="code">Office Code</label>
                                    <div class="form-group has-feedback{{ $errors->has('code') ? ' has-error' : '' }}">
                                        <input type="number" maxlength="10" class="form-control" name="code" value="{{ $office->code ?? old('code') }}" placeholder="Code" required >

                                        @if ($errors->has('code'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="mobile">Mobile Number</label>
                                    <div class="form-group has-feedback{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <input type="number" maxlength="11" class="form-control" name="mobile" value="{{ $office->mobile ?? old('mobile') }}" placeholder="Mobile Number" required >

                                        @if ($errors->has('mobile'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    
                                    <label for="status">Status</label>
                                    <div class="form-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="switch">
                                            <input type="checkbox" name="status" id="status" @isset($office){{ $office->status ==true ? 'checked':'' }} @endisset>
                                            <span class="slider round"></span>
                                        </label>

                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <label for="is_starting_office">Is Starting Office</label>
                                    <div class="form-group has-feedback{{ $errors->has('is_starting_office') ? ' has-error' : '' }}">
                                        <label class="switch">
                                            <input type="checkbox" name="is_starting_office" id="is_starting_office" @isset($office){{ $office->is_starting_office ==true ? 'checked':'' }} @endisset>
                                            <span class="slider round"></span>
                                        </label>

                                        @if ($errors->has('is_starting_office'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('is_starting_office') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-info btn-lg">
                                        @if(isset($office))
                                            <i class="fa fa-arrow-circle-up"></i>
                                            Office Update
                                        @else
                                            <i class="fa fa-plus-circle"></i>
                                            Office Create
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script> -->

    <script>
        // $(document).ready(function() {
        //     $('.js-example-basic-single').select2({
        //         placeholder: "Select Role",
        //         allowClear: true
        //     });

        //     $('.dropify').dropify();
        // });

    </script>


@endpush
