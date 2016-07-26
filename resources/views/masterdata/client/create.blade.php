@extends('master.default')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Add New Client</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('dashboard.index') !!}">Home</a>
                </li>
                <li class="active">
                    <strong>Add New Client</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title ">
                        <h5>Add New Client Form</h5>
                    </div>

                    <div class="ibox-content clearfix">

                        {!! Form::open(array('route' => array('masterdata.client.store'), 'class' => 'form-horizontal')) !!}

                        @include('masterdata.client._form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
