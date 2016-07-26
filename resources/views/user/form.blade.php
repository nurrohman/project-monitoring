@extends('master.default')

@section('title', 'User Detail')
<?php

    $edit = false;
    if($user)
    {
        $edit = true;
    }
?>

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>{!! ($edit)?'Edit User':'Tambah User' !!}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('dashboard.index') !!}">Home</a>
            </li>
            <li class="active">
                <strong>User Detail</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">
            @if($edit)
                {!! Form::model($user,array('route' => array('user.update', $user->id), 'method' => 'post')) !!}
            @else
                {!! Form::open(['route' => ['user.store'], 'method' => 'post']) !!}
            @endif
            <div class="ibox">
                <div class="ibox-title ">
                    <h5>{{'Add New User Form'}}</h5>
                </div>
                <div class="ibox-content clearfix">
                    <div class="form-group {{ $errors->first('name', 'has-error') }}">
                        {!! Form::label('name', 'Name', array('class' => '')) !!}
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        <div>
                            <span class="help-block"> {{ $errors->first('name') }} </span>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Email', array('class' => '')) !!}
                        {!! Form::text('email', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name', 'Password', array('class' => '')) !!}
                        {!! Form::text('password', null, array('class' => 'form-control')) !!}
                    </div>
                    {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection