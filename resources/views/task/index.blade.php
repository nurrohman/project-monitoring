@extends('master.default')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Task List</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('dashboard.index') !!}">Home</a>
                </li>
                <li class="active">
                    <strong>Task List</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox">
            <div class="ibox-title">
                <h5>All client master data</h5>
                <div class="ibox-tools">
                    <a href="{!! route('project.task.create', $feature_id) !!}" class="btn btn-primary btn-xs">Tambah Task</a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="project-list">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th width="220"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $row)
                                <tr>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! $row->status !!}</td>
                                    <td class="project-actions">
                                        <a href="{!! route('project.task.edit', ['id' => $row->id]) !!}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{!! route('project.task.destroy', ['id' => $row->id]) !!}" onclick="return submitDelete()" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $items->render(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
