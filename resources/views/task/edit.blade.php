@extends('master.default')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit Task</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('dashboard.index') !!}">Home</a>
                </li>
                <li>
                    <a href="{!! route('project.task.index', $item->feature_id) !!}">Task List</a>
                </li>
                <li class="active">
                    <strong>Edit Task</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title ">
                        <h5>Edit Task Form</h5>
                    </div>

                    <div class="ibox-content clearfix">

                        {!! Form::open(array('route' => array('project.task.update', $item->id), 'class' => 'form-horizontal')) !!}

                            @include('task._form')

                            <div class="form-group">
                                {!! Form::label('status', 'Status', array('class' => 'col-sm-2 control-label')) !!}

                                <div class="col-sm-10">
                                    {!! Form::select('status', ['done' => 'Selesai', 'not_done' => 'Belum Selesai
                                    '], $item->status ?? null, array('class' => 'form-control')) !!}
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                                    <button class="btn btn-white" type="button">Cancel</button>
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
