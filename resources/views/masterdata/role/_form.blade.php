<div class="form-group">
    {!! Form::label('role', 'Role Name', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('role', $item->role ?? null, array('class' => 'form-control')) !!}
    </div>

</div>

<div class="hr-line-dashed"></div>

<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        <button class="btn btn-white" type="button">Cancel</button>
    </div>
</div>