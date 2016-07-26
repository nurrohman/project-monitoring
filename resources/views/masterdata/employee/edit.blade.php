@extends('master.default')

@section('title', 'Edit Employee')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Edit Employee</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('dashboard.index') !!}">Home</a>
                </li>
                <li class="active">
                    <strong>Edit Employee</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title ">
                        <h5>Edit Employee Form</h5>
                    </div>

                    <div class="ibox-content clearfix">

                        {!! Form::open(array('route' => array('masterdata.employee.update', $item->id), 'class' => 'form-horizontal')) !!}

                        @include('masterdata.employee._form')

                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection