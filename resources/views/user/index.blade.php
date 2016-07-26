@extends('master.default')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>User List</h2>
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

<div class="wrapper wrapper-content animated fadeIn">
    <div class="ibox">
        <div class="ibox-title">
            <h5>All User Data</h5>
        </div>

        <div class="ibox-content">
            <div class="project-list">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $row)
                                <tr>
                                    <td>{!! $row->name !!}</td>
                                    <td>{!! $row->email !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $user->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



