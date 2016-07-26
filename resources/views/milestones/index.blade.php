@extends('master.default')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Milestones List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('dashboard.index') !!}">Home</a>
            </li>
            <li>
                <a href="{!! route('project.index') !!}">Project</a>
            </li>
            <li class="active">
                <strong>Milestones List</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox">
        <div class="ibox-title">
            <h5>All client master data</h5>
            <div class="ibox-tools">
                <a href="{!! route('project.milestone.create', ['project_id' => $project_id]) !!}" class="btn btn-primary btn-xs">Add Milestones</a>
            </div>
        </div>

        <div class="ibox-content">
            <div class="project-list">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Activity</th>
                                <th width="160"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $row)
                                <tr>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! ($row->project)?$row->project->name:'' !!}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{!! route('project.milestone.edit', ['project_id' => $row->project_id, 'id'=>$row->id]) !!}" class="btn btn-primary btn-xs">edit</a>
                                            <a href="{!! route('project.milestone.destroy', ['project_id' => $row->project_id, 'id'=>$row->id]) !!}" class="btn btn-danger btn-xs" onclick="return confirm('apa anda yakin !')">delete</a>
                                        </div>
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