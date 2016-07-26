<div class="ibox">
    <div class="ibox-title ">
        <h5>{{'Add New Project Form'}}</h5>
    </div>
    <div class="ibox-content clearfix">
        <div class="form-group">
            {!! Form::label('name', 'Project Name', array('class' => '')) !!}
            {!! Form::text('name', $item->name ?? null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('client_id', 'Client Name', array('class' => '')) !!}
            {!! Form::select('client_id', $client,  $item->client_id ?? null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('scope', 'Scope', array('class' => '')) !!}
            {!! Form::text('scope', $item->scope ?? null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description', array('class' => '')) !!}
            {!! Form::textArea('description', $item->description ?? null, array('class' => 'form-control')) !!}
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"> Technology </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('bahasa_prog', 'Bahasa Pemrograman', array('class' => '')) !!}
                    {!! Form::text('bahasa_prog', $item->bahasa_prog ?? null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('database', 'Database', array('class' => '')) !!}
                    {!! Form::text('database', $item->database ?? null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('server', 'Server', array('class' => '')) !!}
                    {!! Form::text('server', $item->server ?? null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('other', 'Other', array('class' => '')) !!}
                    {!! Form::text('other', $item->other ?? null, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>

        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>
</div>