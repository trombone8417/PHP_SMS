@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Day
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($day, ['route' => ['days.update', $day->day_id], 'method' => 'patch']) !!}
                <!-- Name Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
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
