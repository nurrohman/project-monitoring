@extends('master.default')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Daftar Projek</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('dashboard.index') !!}">Home</a>
            </li>
            <li class="active">
                <strong>Daftar Projek</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Semua Data Master Projek</h5>
            <div class="ibox-tools">
                <a href="{!! route('project.create') !!}" class="btn btn-primary btn-xs">Tambah Projek</a>
            </div>
        </div>

        <div class="ibox-content">
            <div class="project-list">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Projek</th>
                                <th>Klien</th>
                                <th>Bahasa Pemrograman</th>
                                <th>Database</th>
                                <th>Server</th>
                                <th width="140"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $row)
                                <tr>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! ($row->client)?$row->client->client_name:'' !!}</td>
                                    <td>{!! $row->bahasa_prog !!}</td>
                                    <td>{!! $row->database !!}</td>
                                    <td>{!! $row->server !!}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div class='btn-group'>
                                                <button class='btn btn-default btn-xs dropdown-toggle' type='button' data-toggle='dropdown'>action <span class='caret'></span>
                                                </button>

                                                <ul class='dropdown-menu pull-right' role='menu'>
                                                    <li><a href="{!! route('project.edit', ['id'=>$row->id]) !!}">edit</a></li>
                                                    <li class='divider'></li>
                                                    <li><a href="{!! route('project.show', ['project_id'=>$row->slug]) !!}">detail</a></li>
                                                </ul>
                                            </div>

                                            <a href="{!! route('project.destroy', ['id'=>$row->id]) !!}" class="btn btn-danger btn-xs" onclick="return confirm('apa anda yakin !')">delete</a>
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
