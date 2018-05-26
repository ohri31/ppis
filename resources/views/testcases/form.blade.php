<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Test case name:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('steps') ? 'has-error' : ''}}">
    {!! Form::label('steps', 'Test case steps:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::textarea('steps', null, ['class' => 'form-control']) !!}
        {!! $errors->first('steps', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('test_data') ? 'has-error' : ''}}">
    {!! Form::label('test_data', 'Test data:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::textarea('test_data', null, ['class' => 'form-control']) !!}
        {!! $errors->first('test_data', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('actual_results') ? 'has-error' : ''}}">
    {!! Form::label('actual_results', 'Actual results:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::textarea('actual_results', null, ['class' => 'form-control']) !!}
        {!! $errors->first('actual_results', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
    {!! Form::label('notes', 'Notes:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
        {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('test_report_id') ? 'has-error' : ''}}">
    {!! Form::label('test_report_id', 'Actual results:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::select('test_report_id', $reports, null, ['class' => 'form-control']) !!}
        {!! $errors->first('test_report_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('test_case_type_id') ? 'has-error' : ''}}">
    {!! Form::label('test_case_type_id', 'Actual results:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::select('test_case_type_id', $types, null, ['class' => 'form-control']) !!}
        {!! $errors->first('test_case_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('expected_result_id') ? 'has-error' : ''}}">
    {!! Form::label('expected_result_id', 'Expected results:', ['class' => 'control-label']) !!}
    <div>
        {!! Form::select('expected_result_id', $expected, null, ['class' => 'form-control']) !!}
        {!! $errors->first('expected_result_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<input type="submit" class="btn btn-success" value="Save" style="width: 100%;padding: 15px"/>
                    
<a href="{{ url()->previous() }}" class="btn btn-light" style="width: 100%;padding: 15px;margin-top: 15px;">
    Go back 
</a>
