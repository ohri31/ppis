<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Test case name:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input type="submit" class="btn btn-success" value="Save" style="width: 100%;padding: 15px"/>
                    
<a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
    Go back 
</a>
