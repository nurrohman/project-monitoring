@extends('master.default')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Client List</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('dashboard.index') !!}">Home</a>
            </li>
            <li class="active">
                <strong>Client List</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>All client master data</h5>
                    <div class="ibox-tools">
                        <a href="{!! route('masterdata.client.create') !!}" class="btn btn-primary btn-xs">Create new Client</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row m-b-sm m-t-sm">
                        <div class="col-md-1">
                            <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Refresh</button>
                        </div>
                        <div class="col-md-11">
                            <div class="input-group"><input placeholder="Search" class="input-sm form-control" type="text"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                        </div>
                    </div>

                    <div class="project-list">
                        <div class="table-responsive">
                            <table class="table table-hover table-border">
                                <tbody>
                                    @foreach($items as $row)
                                        <tr>
                                            <td class="project-status" width="70px">
                                                <span class="label label-primary">Active</span>
                                            </td>
                                            <td class="project-title">
                                                <a href="{!! route('masterdata.client.edit', ['id' => $row->id]) !!}">{{ $row->client_name }}</a>
                                                <br />
                                                <small>Created {!! $row->created_at->format('d.m.Y') !!}</small>
                                            </td>
                                            <td class="project-actions">
                                                <a href="{!! route('masterdata.client.edit', ['id' => $row->id]) !!}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                <a href="{!! route('masterdata.client.destroy', ['id' => $row->id]) !!}" onclick="return submitDelete()" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $items->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('front.javascript')

<script type="text/javascript">
function submitDelete(){
    return confirm("Are you sure want to delete this Client?");
}
</script>

@endpush
