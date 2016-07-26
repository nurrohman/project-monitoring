<div class="form-group">
    {!! Form::label('nip', 'NIP', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('nip', $item->nip ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('name', 'Employee Name', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('name', $item->name ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('npwp', 'NPWP', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('npwp', $item->npwp ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('field_of_study', 'Field of Study', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('field_of_study', $item->field_of_study ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('email', $item->email ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('birthdate', 'Birth Date', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('birthdate', $item->birthdate ?? null, array('class' => 'form-control datepicker')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('birthplace', 'Birth Place', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('birthplace', $item->birthplace ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('phone', $item->phone ?? null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="hr-line-dashed"></div>

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <button class="btn btn-white" type="button">Cancel</button>
    </div>
</div>