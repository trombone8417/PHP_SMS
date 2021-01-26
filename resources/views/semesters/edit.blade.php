@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        <i class="fa fa-gear">
            &nbsp;Semester
        </i>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($semester, ['route' => ['semesters.update', $semester->semester_id], 'method' =>
                'patch']) !!}

                <div class="form-group col-sm-6">
                    {!! Form::label('semester_name', 'Semester Name:') !!}
                    {!! Form::text('semester_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Semester Code Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('semester_code', 'Semester Code:') !!}
                    {!! Form::text('semester_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' =>
                    255]) !!}
                </div>

                <!-- Semester Duration Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('semester_duration', 'Semester Duration:') !!}
                    {!! Form::text('semester_duration', null, ['class' => 'form-control','maxlength' => 255,'maxlength'
                    => 255]) !!}
                </div>

                <!-- Semester Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('semester_description', 'Semester Description:') !!}
                    {!! Form::textarea('semester_description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="modal-footer">
                    <a href="{{ route('semesters.index') }}" class="btn btn-default">Back</a>
                    <!-- Submit Field -->
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
