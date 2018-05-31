<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Video title:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Video description:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('request_id') ? 'has-error' : ''}}">
    {!! Form::label('request_id', 'Request:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::select('request_id', $requests, null, ['class' => 'form-control']) !!}
        {!! $errors->first('request_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input type="submit" class="btn btn-success" value="Save" style="width: 100%;padding: 15px"/>
                    
<a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
    Go back 
</a>
