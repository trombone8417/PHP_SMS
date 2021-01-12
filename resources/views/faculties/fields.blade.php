<!-- Faculty Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_name', 'Faculty Name:') !!}
    {!! Form::text('faculty_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Faculty Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_code', 'Faculty Code:') !!}
    {!! Form::text('faculty_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Faculty Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('faculty_description', 'Faculty Description:') !!}
    {!! Form::textarea('faculty_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Faculty Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('faculty_status', 'Faculty Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('faculty_status', 0) !!}
        {!! Form::checkbox('faculty_status', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('faculties.index') }}" class="btn btn-default">Cancel</a>
</div>
