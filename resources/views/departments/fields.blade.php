<!-- Faculty Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_id', 'Faculty Id:') !!}
    {!! Form::number('faculty_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_name', 'Department Name:') !!}
    {!! Form::text('department_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Department Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_code', 'Department Code:') !!}
    {!! Form::number('department_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('department_description', 'Department Description:') !!}
    {!! Form::textarea('department_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_status', 'Department Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('department_status', 0) !!}
        {!! Form::checkbox('department_status', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('departments.index') }}" class="btn btn-default">Cancel</a>
</div>
