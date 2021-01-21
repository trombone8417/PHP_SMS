@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Level
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($level, ['route' => ['levels.update', $level->level_id], 'method' => 'patch']) !!}

                   <div class="form-group col-sm-6">
                    {!! Form::label('level', 'Level:') !!}
                    {!! Form::text('level', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Course Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('course_id', 'Course Id:') !!}
                    {!! Form::number('course_id', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Level Description Field -->
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('level_description', 'Level Description:') !!}
                    {!! Form::textarea('level_description', null, ['class' => 'form-control']) !!}
                </div>
                <div class="modal-footer">
                    <a href="{{ route('days.index') }}" class="btn btn-default">Back</a>
                    <!-- Submit Field -->
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
