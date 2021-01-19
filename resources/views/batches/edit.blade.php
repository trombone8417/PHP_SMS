@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Batch
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($batch, ['route' => ['batches.update', $batch->batch_id], 'method' => 'patch']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('year', 'Batch Year:') !!}
                        {!! Form::text('year', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255])
                        !!}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('roles.index') }}" class="btn btn-primary">Back</a>
                        <!-- Submit Field -->
                        {!! Form::submit('Update Batch', ['class' => 'btn btn-info']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
