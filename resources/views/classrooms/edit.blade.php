@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Classroom
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($classroom, ['route' => ['classrooms.update', $classroom->classroom_id], 'method' =>
                'patch']) !!}

                <div class="form-group col-sm-6">
                    {!! Form::label('classroom_name', 'Classroom Name:') !!}
                    {!! Form::text('classroom_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Classroom Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('classroom_code', 'Classroom Code:') !!}
                    {!! Form::number('classroom_code', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Classroom Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('classroom_description', 'Classroom Description:') !!}
                    {!! Form::textarea('classroom_description', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Classroom Status Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('classroom_status', 'Classroom Status:') !!}
                    <label>
                        {!! Form::hidden('classroom_status', 0) !!}
                        {!! Form::checkbox('classroom_status', '1', null) !!}
                    </label>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('classrooms.index') }}" class="btn btn-default">Back</a>
                    <!-- Submit Field -->
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection