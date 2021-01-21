@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-sun-o" aria-hidden="true"></i> Days</h1>
        <h1 class="pull-right">
           <a data-toggle="modal"
           data-target="#day-add-modal"
           class="btn btn-success pull-right"
           style="margin-top: -10px;margin-bottom: 5px">Add Day</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('days.table')
                    {!! Form::open(['route' => 'days.store']) !!}

                @include('days.fields')

                {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

