@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Class Schedules</h1>
        <h1 class="pull-right">
           <a data-toggle="modal" data-target="#class_schedules-add-modal"  class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('class_schedules.table')
                    @include('class_schedules.edit')

                    {!! Form::open(['route' => 'classSchedules.store']) !!}

                        @include('class_schedules.fields')

                    {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

