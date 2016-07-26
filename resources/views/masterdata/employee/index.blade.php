@extends('master.default')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Employee List</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{!! route('dashboard.index') !!}">Home</a>
                </li>
                <li class="active">
                    <strong>Employee List</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">
        <div class="ibox">
            <div class="ibox-title">
                <h5>All client master data</h5>
                <div class="ibox-tools">
                    <a href="{!! route('masterdata.employee.create') !!}" class="btn btn-primary btn-xs">Tambah Employee</a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="project-list">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>NIP</th>
                                <th>NPWP</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="160"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $row)
                                <tr>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! $row->nip !!}</td>
                                    <td>{!! $row->npwp !!}</td>
                                    <td>{!! $row->email!!}</td>
                                    <td>{!! $row->phone !!}</td>
                                    <td class="project-actions">
                                        <a href="{!! route('masterdata.employee.edit', ['id' => $row->id]) !!}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="{!! route('masterdata.employee.destroy', ['id' => $row->id]) !!}" onclick="return submitDelete()" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a>
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
