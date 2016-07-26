@extends('master.default')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Project  Detail</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li class="active">
                    <strong>Project Detail</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="wrapper wrapper-content">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                    <h2>Project Detail</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>Project Name:</dt> <dd>{{ $item->name  }}</dd>
                                </dl>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">
                                    <dt>Client:</dt> <dd> {{ $item->client->client_name  }} </dd>
                                </dl>
                            </div>
                            <div class="col-lg-7" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>Last Updated:</dt> <dd>{{ $item->updated_at  }}</dd>
                                    <dt>Created:</dt> <dd> 	{{ $item->updated_at  }} </dd>
                                </dl>
                            </div>
                        </div>

                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                                <div class="panel blank-panel">
                                    <div class="panel-heading">
                                        <div class="panel-options">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab-1" data-toggle="tab">Team</a></li>
                                                <li class=""><a href="#tab-2" data-toggle="tab">Milestone</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab-1">
                                                <div class="table-responsive">

                                                    <div class="pull-right">
                                                        <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-team">Team</a>
                                                    </div>

                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($project_assign as $row)
                                                            <tr>
                                                                <td>{!! $row->project->name ?? null !!}</td>
                                                                <td>{!! $row->employee->name ?? null !!}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab-2">
                                                <div class="table-responsive">

                                                    <div class="pull-right">
                                                        <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-milestone">Milestone</a>
                                                    </div>

                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Milesstone Name</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th width="130"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($milestones as $row)
                                                                <tr>
                                                                    <td>{{ $row->name  }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($row->start_date)->format('d-m-Y') }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($row->end_date)->format('d-m-Y') }}</td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <div class='btn-group'>
                                                                                <button class='btn btn-default btn-xs dropdown-toggle' type='button' data-toggle='dropdown'>action <span class='caret'></span>
                                                                                </button>

                                                                                <ul class='dropdown-menu pull-right' role='menu'>
                                                                                    <li><a href="{!! route('project.milestone.edit', ['id'=>$row->id]) !!}">edit</a></li>
                                                                                    <li class='divider'></li>
                                                                                    <li><a href="{!! route('project.feature.index', ['project_id'=>$row->id]) !!}">featured</a></li>
                                                                                </ul>
                                                                            </div>

                                                                            <a href="{!! route('project.milestone.destroy', ['id'=>$row->id]) !!}" class="btn btn-danger btn-xs" onclick="return confirm('apa anda yakin !')">delete</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                           @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="modal-milestone" class="modal fade inmodal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="alert alert-danger" role="alert" v-if="alerts.length" style="margin-top: 1.5em">
                    <p v-for="alert in alerts">@{{ alert }}</p>
                </div>

                <div class="modal-body">

                    {!! Form::open(['url' => "#", 'method' => 'post']) !!}

                        <h4>Name</h4>
                        <input v-model="newMilestone.name" type="text" required="" name="name" class="form-control"/>
                        <br />

                        <h4>Start Date</h4>
                        <input v-model="newMilestone.start_date" type="text" name="start_date" class="form-control" id="start-date"/>
                        <br />

                        <h4>End date</h4>
                        <input v-model="newMilestone.end_date" type="text" name="end_date" class="form-control" id="end-date"/>
                        <br />
                        <button type="button" v-on:click = "createMilestone" class="btn btn-primary">Submit</button>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-team" class="modal fade inmodal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="alert alert-danger" role="alert" v-if="alerts2.length" style="margin-top: 1.5em">
                    <p v-for="alert2 in alerts2">@{{ alert2 }}</p>
                </div>

                <div class="modal-body">

                    {!! Form::open(['url' => "#", 'method' => 'post']) !!}

                    <h4>Employee</h4>
                    {!! Form::select('employee_id', $employee, null, ['v-model' => 'newTeam.employee_id', 'class' => 'form-control']) !!}
                    <br />

                    <h4>Role</h4>
                    {!! Form::select('user_role', $role, null, ['v-model' => 'newTeam.user_role', 'class' => 'form-control']) !!}
                    <br />

                    <button type="button" v-on:click = "createTeam" class="btn btn-primary">Submit</button>

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('front.javascript')
    <script type="text/javascript">

        new Vue({
            el: '#modal-milestone',
            data: {
                newMilestone: {
                    name: "",
                    start_date: "",
                    end_date: ""
                },
                alerts: []
            },

            methods: {
                createMilestone: function(){
                    var data = {
                        name: this.newMilestone.name,
                        start_date: this.newMilestone.start_date,
                        end_date: this.newMilestone.end_date
                    };

                    var self = this;

                    $.post('{{ route('project.milestone.store', ['id'=>$item->id]) }}', data).done(function(data){
                        window.location.assign('{{ route("project.show", ['id' => $item->id]) }}');
                    }).fail(function(xhr){

                        var result = [];

                        if(xhr.status == 422){
                            var alerts = JSON.parse(xhr.responseText);

                            for(var index in alerts){
                                var values = alerts[index];

                                values.forEach(function(val){
                                    result.push(val);
                                });
                            }
                        }else{
                            result.push(xhr.statusText);
                        }

                        self.alerts = result;
                    });
                }
            },

            ready: function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
            }
        });

        new Vue({
            el: '#modal-team',
            data: {
                newTeam: {
                    employee_id: "",
                    user_role: ""
                },
                alerts2: []
            },

            methods: {
                createTeam: function(){
                    var data = {
                        employee_id: this.newTeam.employee_id,
                        user_role: this.newTeam.user_role
                    };

                    var self = this;

                    $.post('{{ route('project.assign.store', ['id'=>$item->id]) }}', data).done(function(data){
                        window.location.assign('{{ route("project.show", ['id' => $item->id]) }}');
                    }).fail(function(xhr){

                        var result = [];

                        if(xhr.status == 422){
                            var alerts = JSON.parse(xhr.responseText);

                            for(var index in alerts){
                                var values = alerts[index];

                                values.forEach(function(val){
                                    result.push(val);
                                });
                            }
                        }else{
                            result.push(xhr.statusText);
                        }

                        self.alerts2 = result;
                    });
                }
            },

            ready: function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
            }
        });

        $(document).ready(function(){
            $("#start-date").datepicker({
                format: 'dd-mm-yyyy',
                startDate: '1d'
            }).on('show', function(e) {
                $('#end-date').datepicker("setStartDate", e.date);
            });

            $("#end-date").datepicker({
                format: 'dd-mm-yyyy',
                startDate: '1d'
            }).on('show', function(e) {
                $('#start-date').datepicker("setEndDate", e.date);
            });
        });
    </script>

@endpush

