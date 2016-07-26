<div class="form-group">
    {!! Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) !!}

    <div class="col-sm-10">
        {!! Form::text('name', $item->name ?? null, array('class' => 'form-control')) !!}
    </div>
</div>
