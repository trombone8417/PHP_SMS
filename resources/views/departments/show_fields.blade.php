<!-- Faculty Id Field -->
<div class="form-group">
    {!! Form::label('faculty_id', 'Faculty Id:') !!}
    <p>{{ $department->faculty_id }}</p>
</div>

<!-- Department Name Field -->
<div class="form-group">
    {!! Form::label('department_name', 'Department Name:') !!}
    <p>{{ $department->department_name }}</p>
</div>

<!-- Department Code Field -->
<div class="form-group">
    {!! Form::label('department_code', 'Department Code:') !!}
    <p>{{ $department->department_code }}</p>
</div>

<!-- Department Description Field -->
<div class="form-group">
    {!! Form::label('department_description', 'Department Description:') !!}
    <p>{{ $department->department_description }}</p>
</div>

<!-- Department Status Field -->
<div class="form-group">
    {!! Form::label('department_status', 'Department Status:') !!}
    <p>{{ $department->department_status }}</p>
</div>

