@extends('master.default')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Tambah Projek</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('dashboard.index') !!}">Home</a>
                </li>
                <li class="active">
                    <strong>Project Detail</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                {!! Form::open(['route' => ['project.store'], 'method' => 'post']) !!}

                     @include('project._form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
