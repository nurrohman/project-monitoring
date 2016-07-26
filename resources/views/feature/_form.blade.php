<div class="form-group">
    {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('name', $item->name ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('due_date', 'Due Date', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('due_date', $item->due_date ?? null, array('class' => 'form-control datepicker')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::select('status', ['not active', 'active'], $item->status ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="hr-line-dashed"></div>

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <button class="btn btn-white" type="button">Cancel</button>
    </div>
</div>