<!-- Class Id Field -->
<div class="form-group">
    {!! Form::label('class_id', 'Id:') !!}
    <p>{{ $classes->class_id }}</p>
</div>
<!-- Class Name Field -->
<div class="form-group">
    {!! Form::label('class_name', 'Class Name:') !!}
    <p>{{ $classes->class_name }}</p>
</div>

<!-- Class Code Field -->
<div class="form-group">
    {!! Form::label('class_code', 'Class Code:') !!}
    <p>{{ $classes->class_code }}</p>
</div>
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $classes->created_at }}</p>
</div>
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $classes->updated_at }}</p>
</div>

